<%-- 
    Document   : viewCustomer
    Created on : Apr 18, 2019, 5:24:13 PM
    Author     : F.I.R.E.N.Z.E
--%>

<%@page import="java.sql.*"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>View All</title>
        <style>
            body
            {
                background-image : url('https://ak4.picdn.net/shutterstock/videos/1008360604/thumb/1.jpg');
                background-size: 1520px 730px;
                color: #66ccff;
                font-family: "Arial Black", Gadget, sans-serif;	
                font-weight: bold;

            }
            .loginDiv
            {
                border-style: solid;
                border-color: black;
                width: 600px;
                height: 50px;
                position: relative;
                top: 100px;
                text-align: center;
                padding-top: 30px;
                left: 430px;
                border-width: 10px;

            }
            .textBox
            {
                background-color: #9999ff;
                border-style: none;
                height: 25px;

            }
            .buttons
            {
                color: grey;
                background-color: black;
                border-style: none;
                height: 100px;
                width: 100px;
                font-weight: bold;
                position: relative;

            }
            .buttons:hover
            {
                background-color: #9999ff;
                border-style: solid;
                border-color: black;
                color: black;
                cursor: hand;
            }
            .header
            {
                position: absolute;
                top: 100px;
                left: 450px;
                font-size: 40px;
            }
            .passid
            {
                display: none;
                border-style: solid;
                border-color: #000000;
                background-color: #666666;
                width: 300px;
                height: 200px;
                position: relative;
                left: 980px;
                opacity: 0.7;
            }
        </style>
    </head>
    <body>
        <div class="loginDiv">
        <h3>View All Customers (ADMIN) by <% out.println(session.getAttribute("accno")); %></h3>
        </div>
        <br/><br/>
        <div style="background-color: #000000;position: relative; top: 200px;">
            <center>
        <table border="1" width="1500">
            <thead>
            <th>ACCNO</th><th>NAME</th><th>ADDRESS</th><th>PHONENO</th><th>PROPERTIES</th><th>LWTIME</th><th>LWTYPE</th><th>LWAMOUNT</th><th>BALANCE</th>
        </thead>
        <tbody>
            <%
                Class.forName("com.mysql.jdbc.Driver").newInstance();
                Connection con = DriverManager.getConnection("jdbc:mysql://localhost:3306/Vault", "root", "");
                if (!con.isClosed()) {
                    System.out.println("Connection Successfull");
                }
                Statement stmt = con.createStatement();
                stmt.executeUpdate("use Vault");

                ResultSet rs = stmt.executeQuery("select * from customer");

                while (rs.next())
                {
                    out.println("<tr><td>" + rs.getString(1) + "</td>");
                    out.println("<td>" + rs.getString(2) + "</td>");
                    out.println("<td>" + rs.getString(3) + "</td>");
                    out.println("<td>" + rs.getString(4) + "</td>");
                    out.println("<td>" + rs.getString(5) + "</td>");
                    out.println("<td>" + rs.getString(6) + "</td>");
                    out.println("<td>" + rs.getString(7) + "</td>");
                    out.println("<td>" + rs.getString(8) + "</td>");
                    out.println("<td>" + rs.getString(9) + "</td></tr>");
                }
            %>
        </tbody>
    </table>
            </center>
        </div>
        <% if (session.getAttribute("type").toString().equals("customer")) {
                out.println("<br/><a class=\"buttons\" style=\"text-decoration: none;left: 700px;padding: 6px;top:-130px;\" href=\"customerHome.jsp\">HOME</a> ");
            } else if (session.getAttribute("type").toString().equals("admin")) {
                out.println("<br/><a class=\"buttons\" style=\"text-decoration: none;left: 700px;padding: 6px;top:-130px;\" href=\"adminHome.jsp\">HOME</a> ");
            }
    %>
</body>
</html>
