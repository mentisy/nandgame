# nandgame

### Solutions to [nandgame.com](https://nandgame.com/).

An educational puzzle game. Solve a series of tasks where you build increasingly powerful components. Starts with the
simplest logical components and ends up with a programmable computer.

## Levels

- ### Logic Gates
    - [x] **Invert**
    - [x] **And**
    - [x] **Or**
    - [x] **Xor** *(Simplest solution, possible to solve with fewer nand-gates)*
- ### Arithmetics
    - [x] **Half Adder** *(Simplest solution, possible to solve with fewer nand-gates)*
    - [x] **Full Adder** *(Possible to solve with fewer components)*
    - [x] **Multi-bit Adder** *(Possible to solve with fewer components)*
    - [x] **Increment**
    - [x] **Subtraction**
    - [x] **Equal to Zero**
    - [x] **Less than Zero**
- ### Plumbing
    - [x] **Selector**
    - [x] **Switch**
- ### Memory
    - [x] **Latch** *(Simplest solution, possible to solve with fewer nand-gates)*
    - [x] **Data Flip-Flop** *(Simplest solution, possible to solve with fewer nand-gates)*
    - [x] **Register**
    - [x] **Counter**
    - [x] **RAM** *(Possible to solve with fewer components)*
- ### Arithmetic Logic Unit (ALU)
    - [x] **Unary ALU**
    - [x] **ALU** *(Possible to solve with fewer components)*
    - [x] **Condition** *(Possible to solve with fewer components)*
- ### Processor
    - [x] **Combined Memory**
    - [x] **Instruction Decoder** *(Possible to solve with fewer components)*
    - [x] **Control Unit**
    - [x] **Program Engine**
    - [x] **Computer**
    - [x] **Input and Output** *(Possible to solve with fewer components)*
- ### Optional
  #### Logic
    - [x] **Nor**
    - [x] **Xnor**
    - [x] **Left Shift**
  #### Artithmetics
    - [ ] **Multiplication**

## Usage
Pro-tip. Clear the levels in the game before you paste in the solutions.

To install the solutions into the game itself, you'll need to the following:
1. Run the code on a PHP server, or grab the contents of the [build file](build.txt).
2. Go to [nandgame.com](https://nandgame.com)
3. Open developer tools of your browser. On Chrome and Firefox, that is the F12 button.
4. On the bottom of the developer tool page on the right hand side, you should see the console. If you don't see it, press escape key.
5. Paste contents into the console.
6. Refresh the page, and you should be all set.
