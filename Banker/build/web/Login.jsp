<%-- 
    Document   : Login
    Created on : Apr 14, 2019, 5:46:33 PM
    Author     : F.I.R.E.N.Z.E
--%>

<%@page import="java.sql.*"%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>



<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>LOGIN</title>
        <style >
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
                width: 400px;
                height: 250px;
                position: relative;
                top: 300px;
                text-align: center;
                padding-top: 30px;
                left: 530px;
                border-width: 20px;

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
                height: 30px;
                width: 80px;
                font-weight: bold;
            }
            .buttons:hover
            {
                background-color: 9999ff;
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
        <script>
            function create()
            {
                location.href = "create.jsp";
            }
        </script>
    </head>
    <body>
    <center>
        <div>
            <h2 class="header">NATIONAL BANK OF INDIA</h2>
        </div>
    </center>
    <div class="loginDiv">
        <h5 style="font-weight: bold;font-size: 20px;position: relative;top: -50px;">LOGIN</h5>
        <form method="post" action="<%= request.getRequestURL()%>">
            <table style="position: relative; left: 60px;top: -50px;">
                <tr><td>Account No:  <input class="textBox" type="text" name="accno"><br/><br/></td></tr>
                <tr><td>Password : <input class="textBox" style="position: relative; left: 10px;" type="password" name="password"><br/><br/></td></tr>
            
            <tr><td>Account Type : <select name="type" class="textBox">
                <option value="admin">Admin</option>
                <option value="customer">Customer</option>
            </select>
                </table>
            <input class="buttons" style="position: relative; top: -40px;" type="submit" value="LOGIN">
        </form>
    </div>
    <%

        String accno = request.getParameter("accno");
        String pass = request.getParameter("password");
        String type = request.getParameter("type");
        boolean flag = false;

        try {
            Class.forName("com.mysql.jdbc.Driver").newInstance();
            Connection con = DriverManager.getConnection("jdbc:mysql://localhost:3306/Vault", "root", "");
            if (!con.isClosed()) {
                System.out.println("Connection Successfull");
            }
            Statement stmt = con.createStatement();
            stmt.executeUpdate("use Vault;");

            if (accno != null) {
                ResultSet rs0 = stmt.executeQuery("select * from customer where ACCNO = " + accno);
                if (rs0.next()) {
                    session.setAttribute("name", rs0.getString(2));
                    session.setAttribute("balance", rs0.getString(9));

                }
                ResultSet rs1 = stmt.executeQuery("select accno from customer");
                while (rs1.next()) {
                    if (rs1.getString(1).equals(accno)) {
                        flag = true;
                    }
                }

            }
            ResultSet rs = stmt.executeQuery("select * from login where accno = '" + accno + "';");
            if (rs.next()) {
                if (rs.getString(2).equals(pass) && rs.getString(3).equals(type) && rs.getString(3).equals("admin") && flag) {
                    session.setAttribute("pass", rs.getString(2));
                    session.setAttribute("accno", rs.getString(1));
                    session.setAttribute("type", rs.getString(3));
                    flag = false;
                    response.sendRedirect("adminHome.jsp");
                } else if (rs.getString(2).equals(pass) && rs.getString(3).equals(type) && rs.getString(3).equals("customer") && flag) {
                    session.setAttribute("pass", rs.getString(2));
                    session.setAttribute("accno", rs.getString(1));
                    session.setAttribute("type", rs.getString(3));
                    flag = false;
                    response.sendRedirect("customerHome.jsp");
                } else if (pass.equals("")) {
                    out.println("Enter valid Password!");
                } else {
                    out.println("Invalid Username and Password");
                }
            }

        } catch (Exception e) {
            out.println("Exception " + e);
        }

    %>
    <button class="buttons" style="text-decoration: none;position: relative;left: 680px; top: 245px;width: 150px;" onclick="create()">CREATE ACCOUNT</button>
</body>
</html>
