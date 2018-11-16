/**
 *
 * @author Jerome Anaeki
 *
 * Assignment10.java
 * This servlet takes in two numbers from an HTML document, "Assignment10.html".
 * It processes the numbers from the form in the HTML file and produces and HTML table
 * based on those values.
 * 
 */

package Assignment10;

import javax.servlet.*;
import javax.servlet.http.*;
import java.io.*;

public class Assignment10 extends HttpServlet {
	
    public void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        response.setContentType("text/html"); // Sets the content type of the return document
        PrintWriter returnHTML = response.getWriter(); // Enables the "returnHTML object to be used to generate XHTML markup
        try{
            // Takes in the parameters from the HTML form
            String stringRow = request.getParameter("row");
            String stringColumn = request.getParameter("column");
            // Converts the strings to integers
            int intRow = Integer.parseInt(stringRow);
            int intColumn = Integer.parseInt(stringColumn);
            
            //Produces the head of the output document
            returnHTML.println("<html><head><title>Assignment10</title></head>");
            returnHTML.println("<body><table border = '1'><caption><h3>Servlet-HTML Table</h3></caption>");
            
            // Uses row and column integers to create an HTML table.
            // Each table cell is contains the row and column numbers.
            for(int i = 1; i <= intRow; i++){
                returnHTML.println("<tr>");
                for(int j = 1; j <= intColumn; j++){
                    returnHTML.println("<td>" + i + "," + j + "</td>");
                }
                returnHTML.println("</tr>");
            }
            returnHTML.println("</table></body></html>");
        }
        catch(Exception e){
            e.printStackTrace();
        }
        returnHTML.close();
    }

}
