<%-- 
    Document   : creater
    Created on : Apr 17, 2019, 2:03:01 PM
    Author     : F.I.R.E.N.Z.E
--%>
<%@page import="java.sql.*"%>
<%@page import="java.util.regex.Matcher"%>
<%@page import="java.util.regex.Pattern"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <%!
            public boolean check(String p) {
                char j, ch;
                int i;
                Pattern pattern = Pattern.compile("[a-zA-Z0-9]*");

                boolean flag0 = false;
                boolean flag1 = false;
                boolean flag2 = false;
                boolean flag3 = false;

                if (p.length() >= 8 && p.length() <= 16) {
                    for (j = 'A'; j < 'Z'; j++) {
                        if (p.indexOf(j) > -1) {
                            flag0 = true;
                        }
                    }

                    if (p.indexOf(j++) > -1) {
                        flag0 = true;
                    }
                    for (i = 0; i < p.length(); i++) {
                        ch = p.charAt(i);
                        if (Character.isDigit(ch)) {
                            flag1 = true;
                        }
                    }
                    Matcher matcher = pattern.matcher(p);
                    if (!matcher.matches()) {
                        flag2 = true;
                    }
                } else {
                    flag0 = false;
                    flag1 = false;
                    flag2 = false;
                }

                if (flag0 == true && flag1 == true && flag2 == true) {
                    flag3 = true;

                } else {
                    flag3 = false;
                }
                return flag3;
            }
        %>
        <% String accno = request.getParameter("accno");
            String pass = request.getParameter("password");
            String cpass = request.getParameter("cpassword");
            String type = request.getParameter("accType");
            String fullname = request.getParameter("fullname");
            String address = request.getParameter("address");
            String phoneno = request.getParameter("phoneno");
            String properties = request.getParameter("properties");
            String balance = request.getParameter("balance");

            Class.forName("com.mysql.jdbc.Driver").newInstance();
            Connection con = DriverManager.getConnection("jdbc:mysql://localhost:3306/Vault", "root", "");
            if (!con.isClosed()) {
                System.out.println("Connection Successfull");
            }
            Statement stmt = con.createStatement();

            if (check(pass) == true && !"".equals(pass) && !"".equals(cpass) && !"".equals(fullname) && !"".equals(address) && !"".equals(phoneno) && !"".equals(properties) && !"".equals(balance)) {
                if (cpass.equals(pass)) {
                    stmt.executeUpdate("insert into login(accno,password,type) values(" + accno + ",'" + pass + "','" + type + "');");
                    stmt.executeUpdate("insert into customer(ACCNO,NAME,ADDRESS,PHONENO,PROPERTIES,LWTIME,LWTYPE,LWAMOUNT,BALANCE) values(" + accno + ",'" + fullname + "','" + address + "'," + phoneno + "," + properties + ",'NULL','NULL',0," + balance + ");");

                    out.println("Account Created!!Please Login.");

                } else {
                    out.println("Passwords do not Match !");
                }
            } else if (check(pass) == false) {
                out.println("Enter a Valid Password");
            } else {
                out.println("Fill All the fields !");
            };

        %>
    </body>
</html>
