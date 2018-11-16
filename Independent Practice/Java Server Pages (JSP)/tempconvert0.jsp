<!--tempconvert0.jsp
	A document that converts a Celsius temperature received from tempconvert0.html
	to Fahrenheit
	-->
<html>
	<head>
		<title>Temperature Converter</title>
	</head>
	<body>
		<p>
			<%
				//Get the Celsius temperature from the form
				String strCtemp = request.getParameter("ctemp");
				float ftemp;
				
				//Convert the value to Fahrenheit
				ftemp = 1.8f * Integer.parseInt(strCtemp) + 32.0f;
			%>
			<!--Use an expression to display the value of the Fahrenheit temperature-->
			Fahrenheit temperature:	<%= ftemp %>
		</p>
	</body>
</html>