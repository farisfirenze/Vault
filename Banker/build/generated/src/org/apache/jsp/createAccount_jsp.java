package org.apache.jsp;

import javax.servlet.*;
import javax.servlet.http.*;
import javax.servlet.jsp.*;
import java.sql.*;
import java.util.regex.Matcher;
import java.util.regex.Pattern;

public final class createAccount_jsp extends org.apache.jasper.runtime.HttpJspBase
    implements org.apache.jasper.runtime.JspSourceDependent {


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
            
  private static final JspFactory _jspxFactory = JspFactory.getDefaultFactory();

  private static java.util.List<String> _jspx_dependants;

  private org.glassfish.jsp.api.ResourceInjector _jspx_resourceInjector;

  public java.util.List<String> getDependants() {
    return _jspx_dependants;
  }

  public void _jspService(HttpServletRequest request, HttpServletResponse response)
        throws java.io.IOException, ServletException {

    PageContext pageContext = null;
    HttpSession session = null;
    ServletContext application = null;
    ServletConfig config = null;
    JspWriter out = null;
    Object page = this;
    JspWriter _jspx_out = null;
    PageContext _jspx_page_context = null;

    try {
      response.setContentType("text/html;charset=UTF-8");
      pageContext = _jspxFactory.getPageContext(this, request, response,
      			null, true, 8192, true);
      _jspx_page_context = pageContext;
      application = pageContext.getServletContext();
      config = pageContext.getServletConfig();
      session = pageContext.getSession();
      out = pageContext.getOut();
      _jspx_out = out;
      _jspx_resourceInjector = (org.glassfish.jsp.api.ResourceInjector) application.getAttribute("com.sun.appserv.jsp.resource.injector");

      out.write("\n");
      out.write("\n");
      out.write("\n");
      out.write("\n");
 Class.forName("com.mysql.jdbc.Driver");
      out.write("\n");
      out.write("\n");
      out.write("\n");
      out.write("\n");
      out.write("<html>\n");
      out.write("    <head>\n");
      out.write("        <title>Login</title>\n");
      out.write("\n");
      out.write("        <style >\n");
      out.write("            body\n");
      out.write("            {\n");
      out.write("                background-image : url('Images/background2.jpg');\n");
      out.write("                background-size: 1520px 730px;\n");
      out.write("                color: #cccccc;\n");
      out.write("                font-family: \"Arial Black\", Gadget, sans-serif;\t\n");
      out.write("                font-weight: bold;\n");
      out.write("\n");
      out.write("            }\n");
      out.write("            .loginDiv\n");
      out.write("            {\n");
      out.write("                border-style: solid;\n");
      out.write("                border-color: black;\n");
      out.write("                width: 600px;\n");
      out.write("                height: 550px;\n");
      out.write("                position: relative;\n");
      out.write("                top: 50px;\n");
      out.write("                padding-top: 30px;\n");
      out.write("                left: 400px;\n");
      out.write("                border-width: 20px;\n");
      out.write("                background-color: #333333;\n");
      out.write("                opacity: 0.8;\n");
      out.write("                padding-left: 60px;\n");
      out.write("\n");
      out.write("            }\n");
      out.write("            .textBox\n");
      out.write("            {\n");
      out.write("                background-color: #9999ff;\n");
      out.write("                border-style: none;\n");
      out.write("                height: 25px;\n");
      out.write("                position: relative;\n");
      out.write("                left: 30px;\n");
      out.write("\n");
      out.write("            }\n");
      out.write("            .buttons\n");
      out.write("            {\n");
      out.write("                position: relative;\n");
      out.write("                left: 80px;\n");
      out.write("                top: 20px;\n");
      out.write("                color: grey;\n");
      out.write("                background-color: black;\n");
      out.write("                border-style: none;\n");
      out.write("                height: 30px;\n");
      out.write("                width: 140px;\n");
      out.write("                font-weight: bold;\n");
      out.write("            }\n");
      out.write("            .buttons:hover\n");
      out.write("            {\n");
      out.write("                background-color: 9999ff;\n");
      out.write("                border-style: solid;\n");
      out.write("                border-color: black;\n");
      out.write("                color: black;\n");
      out.write("                cursor: hand;\n");
      out.write("            }\n");
      out.write("            .header\n");
      out.write("            {\n");
      out.write("                position: absolute;\n");
      out.write("                top: 100px;\n");
      out.write("                left: 450px;\n");
      out.write("                font-size: 40px;\n");
      out.write("                color: black;\n");
      out.write("            }\n");
      out.write("            .passid\n");
      out.write("            {\n");
      out.write("                display: none;\n");
      out.write("                border-style: solid;\n");
      out.write("                border-color: #000000;\n");
      out.write("                background-color: #666666;\n");
      out.write("                width: 300px;\n");
      out.write("                height: 200px;\n");
      out.write("                position: relative;\n");
      out.write("                left: 980px;\n");
      out.write("                opacity: 0.7;\n");
      out.write("            }\n");
      out.write("        </style>\n");
      out.write("    </head>\n");
      out.write("\n");
      out.write("    <body>\n");
      out.write("        <div class=\"loginDiv\">\n");
      out.write("            <form method=\"POST\" action=\"create.jsp\">\n");
      out.write("                <table style=\"position: relative; top: -20px;\">\n");
      out.write("                    <tbody><tr><td>Account No : <input class =\"textBox\" type=\"text\" name=\"accno\" value=\"");


                        Class.forName("com.mysql.jdbc.Driver").newInstance();
                        Connection con = DriverManager.getConnection("jdbc:mysql://localhost:3306/Vault", "root", "");
                        if (!con.isClosed()) {
                            System.out.println("Connection Successfull");
                        }
                        Statement stmt = con.createStatement();
                        stmt.executeUpdate("use Vault");
                        stmt.executeUpdate("create table maxacc as select max(ACCNO) + 1 as ACCNO from customer;");
                        ResultSet rs2 = stmt.executeQuery("select * from maxacc;");

                        if (rs2.next()) {
                            out.println(rs2.getString("ACCNO"));

                        }
                        stmt.executeUpdate("drop table maxacc");


                                                       
      out.write("\" readonly></td></tr><br/><br/><tr><td><br>\n");
      out.write("                            Password : <input class =\"textBox\" type=\"password\" name=\"password\" id=\"pass\"><br/>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;\n");
      out.write("                            <input type=\"checkbox\" onclick=\"change()\">Show Password<br/></td></tr><tr><td>\n");
      out.write("                            Confirm Password : <input class =\"textBox\" type=\"password\" name=\"cpassword\" id=\"cpass\"><br/><br/></td></tr><tr><td>\n");
      out.write("                            Account Type : <select class =\"textBox\" name=\"accType\">\n");
      out.write("                                <option value=\"admin\">ADMIN</option>\n");
      out.write("                                <option value=\"customer\">CUSTOMER</option>\n");
      out.write("                            </select><br/><br/></td></tr><tr><td>\n");
      out.write("                            Full Name (in CAPS): <input class =\"textBox\" type=\"text\" name=\"fullname\"><br/><br/></td></tr><tr><td>\n");
      out.write("                            Address (IN CAPS): <input class =\"textBox\" type=\"text\" name =\"address\"><br/><br/></td></tr><tr><td>\n");
      out.write("                            Phone No: <input class =\"textBox\" type=\"text\" name=\"phoneno\"><br/><br/></td></tr><tr><td>\n");
      out.write("                            Value of properties combined (in $) : <input class =\"textBox\" type=\"text\" name=\"properties\"><br/><br/></td></tr><tr><td>\n");
      out.write("                            Deposit (in $) : <input class =\"textBox\" type=\"text\" name=\"balance\"><br/></td></tr><tr><td>\n");
      out.write("                            <p id=\"warn\"></p>\n");
      out.write("                            <input type=\"submit\" class=\"buttons\" style=\"left: 170px;height: 50px;\" value=\"CREATE ACCOUNT\">\n");
      out.write("                            <a href=\"Login.php\" class=\"buttons\" style=\"left: 340px;top: 40px;text-decoration: none;padding: 10px;\">LOGIN</a>\n");
      out.write("                </table>\n");
      out.write("            </form> \n");
      out.write("            ");
      out.write("\n");
      out.write("\n");
      out.write("            ");
               
                String accno = request.getParameter("accno");
                String pass = request.getParameter("password");
                String cpass = request.getParameter("cpassword");
                String type = request.getParameter("accType");
                String fullname = request.getParameter("fullname");
                String address = request.getParameter("address");
                String phoneno = request.getParameter("phoneno");
                String properties = request.getParameter("properties");
                String balance = request.getParameter("balance");

//                int acc = Integer.parseInt(accno);
//                int ph = Integer.parseInt(phoneno);
//                int pro = Integer.parseInt(properties);
//                int bal = Integer.parseInt(balance);
            
      out.write("\n");
      out.write("            ");
                if (check(pass) == true && !"".equals(pass) && !"".equals(cpass) && !"".equals(fullname) && !"".equals(address) && !"".equals(phoneno) && !"".equals(properties) && !"".equals(balance)) {
                    if (cpass.equals(pass)) {
                        stmt.executeUpdate("insert into login(accno,password,type) values(" + accno + ",'" + pass + "','" + type + "');");
                        stmt.executeUpdate("insert into customer(ACCNO,NAME,ADDRESS,PHONENO,PROPERTIES,LWDATE,LWTIME,LWTYPE,LWAMOUNT,BALANCE) values(" + accno + ",'" + fullname + "','" + address + "'," + phoneno + "," + properties + ",'NULL','NULL','NULL',0," + balance + ");");

                        out.println("Account Created!!Please Login.");

                    } else {
                        out.println("Passwords do not Match !");
                    }
                } else if (check(pass) == false) {
                    out.println("Enter a Valid Password");
                } else {
                    out.println("Fill All the fields !");
                };
            
      out.write(" \n");
      out.write("\n");
      out.write("        </div>\n");
      out.write("        <script>\n");
      out.write("\n");
      out.write("            function change()\n");
      out.write("            {\n");
      out.write("                var x = document.getElementById(\"pass\");\n");
      out.write("                var y = document.getElementById(\"cpass\");\n");
      out.write("                if (x.type === 'password' && y.type === 'password')\n");
      out.write("                {\n");
      out.write("                    x.type = 'text';\n");
      out.write("                    y.type = 'text';\n");
      out.write("                }\n");
      out.write("                else\n");
      out.write("                {\n");
      out.write("                    x.type = 'password';\n");
      out.write("                    y.type = 'password';\n");
      out.write("                }\n");
      out.write("            }\n");
      out.write("\n");
      out.write("        </script>\n");
      out.write("    </body>\n");
      out.write("</html>");
    } catch (Throwable t) {
      if (!(t instanceof SkipPageException)){
        out = _jspx_out;
        if (out != null && out.getBufferSize() != 0)
          out.clearBuffer();
        if (_jspx_page_context != null) _jspx_page_context.handlePageException(t);
        else throw new ServletException(t);
      }
    } finally {
      _jspxFactory.releasePageContext(_jspx_page_context);
    }
  }
}
