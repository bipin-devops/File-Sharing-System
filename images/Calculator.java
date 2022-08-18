// java calculator requirement 1
// sujay man bajracharya

import java.util.*;

public class Calculator
{
	public static void main(String[] args)
	{
		Scanner scan = new Scanner(System.in); // for input
		
		double operand1 = 0.0, operand2 = 0.0; // the 2 operands
		String operator = ""; // the operator
		boolean error = false; // for validation
		boolean end = false; // for looping the program
		double result = 0.0; // stores result after calculation

		// ask for input from user
		
		System.out.print("Enter a post-fix expression: ");
		String postfix = scan.nextLine();
		
		if (postfix.equals("")) // if user enters no expression
		{
			end = true; // stop
		}
			
		while(!end) // loop until end is true
		{
			//validation part
		
			if (postfix.contains(" ")) // checks whether the input string contains space, which is used to separate the parts of the epression
			{
				String[] parts = postfix.split(" "); // splits the string by the spaces and stores in array called parts
				
				if (parts.length != 3) // check array length to see if the expression contains exactly 3 parts
				{
					error = true; // if not then invalid
				}
				else
				{
					try // used for handling exception which can occur when trying to parse a non-number as double
					{ 
						operand1 = Double.parseDouble(parts[0]); // try to parse the first 2 parts as double
						operand2 = Double.parseDouble(parts[1]);
					}
					catch (NumberFormatException e)
					{
						error = true; // if it fails there will be an exception and we have invalid expression
					}
								
					switch(parts[2])
					{
						case "+": // if parts[2] contains a valid operator
						case "-":
						case "*":
						case "/":
							operator = parts[2]; // assign it to the variable
							break;
						default: // else
							error = true; // invalid expression
							break;
					}
				}
				
			}
			else // if the string doesnt contain any spaces
			{
				error = true; // invalid expression
			}

			if(error) // if there was an error
			{
				System.out.println("invalid expression: " + postfix); // give relevant message
			}
			else // otherwise carry on with calculation
			{			
				switch(operator) // calculate based on which operator was input
				{
					case "+":
						result = operand1 + operand2;
						break;
					case "-":
						result = operand1 - operand2;
						break;
					case "*":
						result = operand1 * operand2;
						break;
					case "/":
						result = operand1 / operand2;
						break;
				}
				
				System.out.println(operand1 + " " + operator + " " + operand2 + " = " + result); // display result
			}
			
			// ask for input from user again
			error = false; // reset error flag
			
			System.out.print("Enter a post-fix expression: ");
			postfix = scan.nextLine();
			
			if(postfix.equals(""))
			{
				end = true;
			}
		}
		//
		
	}
}