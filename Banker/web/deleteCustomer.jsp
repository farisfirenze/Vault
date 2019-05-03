<%-- 
    Document   : deleteCustomer
    Created on : Apr 18, 2019, 5:36:33 PM
    Author     : F.I.R.E.N.Z.E
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@ page import = "java.io.*, java.sql.*" %>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Delete Customer</title>
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
                height: 200px;
                position: relative;
                top: 200px;
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
    <center>
        <h3>BEWARE !! You are about to delete a customer </h3>
    </center>
        <div class="loginDiv">
        <form method ="post" action="<%= request.getRequestURL()%>">
            
            <% out.println("Delete by  " + session.getAttribute("name") + "(ADMIN)");%><br/><br/>
            Enter Account No : <input class="textBox" type="text" name="deleteAcc"><br/><br/>
            <input class="buttons" type="submit" value="DELETE">
            <%
                boolean flag = false;
                Class.forName("com.mysql.jdbc.Driver").newInstance();
                Connection con = DriverManager.getConnection("jdbc:mysql://localhost:3306/Vault", "root", "");
                if (!con.isClosed()) {
                    System.out.println("Connection Successfull");
                }
                Statement stmt = con.createStatement();
                stmt.executeUpdate("use Vault");
                String deleteAcc = request.getParameter("deleteAcc");

                ResultSet rs = stmt.executeQuery("select accno from customer");

                while (rs.next()) {
                    if (rs.getString(1).equals(deleteAcc)) {
                        flag = true;
                    }
                }
                if (deleteAcc != null) {
                    if (flag == true) {
                        stmt.executeUpdate("delete from customer where accno = " + deleteAcc);
                        out.println("Account " + deleteAcc + " deleted");
                        flag = false;
                    } else {
                        out.println("Account doesnot exists!");
                    }
                }

            %>
        </form>
        </div>
        <% if (session.getAttribute("type").toString().equals("customer")) {
                out.println("<br/><a class=\"buttons\" style=\"text-decoration: none;left: 500px;padding: 6px;top:120px;\" href=\"customerHome.jsp\">HOME</a> ");
            } else if (session.getAttribute("type").toString().equals("admin")) {
                out.println("<br/><a class=\"buttons\" style=\"text-decoration: none;left: 500px;padding: 6px;top:120px;\" href=\"adminHome.jsp\">HOME</a> ");
            }
        %>
    </body>
</html>
