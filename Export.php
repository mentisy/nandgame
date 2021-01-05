<?php

namespace Avolle\Nandgame;

use Exception;

/**
 * Class Export
 *
 * @package Avolle\Nandgame
 *
 * Used to create local storage items for solved games in http://NandGame.com
 *
 * @see http://NandGame.com
 *
 */
class Export
{
    /**
     * Local storage items are prefix with this
     */
    private const gamePrefix = "NandGame";

    /**
     * Local storage items for levels are prefix with this
     */
    private const levelPrefix = "Levels";

    /**
     * Local storage items are separated by section with this
     */
    private const separator = ":";

    /**
     * Main folder for level solutions
     */
    private const folder = "Levels" . DIRECTORY_SEPARATOR;

    /**
     * Array to keep matrix in. Matrix gives folder and file name by level
     *
     * @var array $matrix
     */
    private $matrix = [];

    /**
     * Export constructor.
     *
     * @param array $matrix
     */
    public function __construct(array $matrix)
    {
        $this->matrix = $matrix;
    }

    /**
     * Returns a local storage item named after the level and containing the nodes and connections for that level
     *
     * @param string $level
     * @return string
     * @throws \Exception
     */
    public function writeLevel(string $level): string
    {
        $item = $this->_levelItem($level);

        $content = $this->_loadLevelFile($level);

        return $this->_wrapper($item, $content);
    }

    /**
     * Returns a prepared local storage item name containing the prefixes and separators on a level basis
     *
     * @param string $level
     * @return string
     */
    private function _levelItem(string $level): string
    {
        return sprintf("%s%s%s%s%s", self::gamePrefix, self::separator, self::levelPrefix, self::separator, $level);
    }

    /**
     * Get the connections and nodes from the solution JSON file
     *
     * @param string $level
     * @return string
     * @throws \Exception If file does not exist
     */
    private function _loadLevelFile(string $level): string
    {
        $file = $this->_matrixToFile($level);
        if (!file_exists($file)) {
            throw new Exception(sprintf("Can't resolve file for level \"%s\" (%s)", $level, $file));
        }

        return file_get_contents($file);
    }

    /**
     * Convert a level name into the proper folder and file using the matrix provided in the matrix file
     *
     * @param string $level
     * @return string
     * @throws \Exception
     */
    private function _matrixToFile(string $level): string
    {
        if (!isset($this->matrix[$level])) {
            throw new Exception(sprintf("Unknown level in matrix: %s", $level));
        }

        return sprintf("%s%s%s%s", self::folder, $this->matrix[$level]["Folder"], DIRECTORY_SEPARATOR, $this->matrix[$level]['File']);
    }

    /**
     * Wrap item name and item content inside a local storage save syntax, as to easily copy/paste into console for storage
     *
     * @param string $item
     * @param string $content
     * @return string
     */
    private function _wrapper(string $item, string $content): string
    {
        $wrapper = "localStorage.setItem(\"%s\", \"%s\");\n";

        return sprintf($wrapper, $item, str_replace('"', '\"', $content));
    }

    /**
     * Create non-level local storage items
     *
     * @param array $levels
     * @return array
     */
    public function basicStorage(array $levels): array
    {
        return [
            $this->_wrapper($this->_item("Levels"), json_encode($levels)),
        ];
    }

    /**
     * Returns a prepared local storage item name containing the prefixes and separators on a game basis
     *
     * @param string $item
     * @return string
     */
    private function _item(string $item): string
    {
        return sprintf("%s%s%s", self::gamePrefix, self::separator, $item);
    }
}
