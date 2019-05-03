package org.apache.jsp;

import javax.servlet.*;
import javax.servlet.http.*;
import javax.servlet.jsp.*;
import java.sql.*;

public final class Login_jsp extends org.apache.jasper.runtime.HttpJspBase
    implements org.apache.jasper.runtime.JspSourceDependent {

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
      out.write("\n");
      out.write("\n");
      out.write("\n");
      out.write("\n");
      out.write("<html>\n");
      out.write("    <head>\n");
      out.write("        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\n");
      out.write("        <title>LOGIN</title>\n");
      out.write("        <style >\n");
      out.write("            body\n");
      out.write("            {\n");
      out.write("                background-image : url('https://ak4.picdn.net/shutterstock/videos/1008360604/thumb/1.jpg');\n");
      out.write("                background-size: 1520px 730px;\n");
      out.write("                color: #66ccff;\n");
      out.write("                font-family: \"Arial Black\", Gadget, sans-serif;\t\n");
      out.write("                font-weight: bold;\n");
      out.write("\n");
      out.write("            }\n");
      out.write("            .loginDiv\n");
      out.write("            {\n");
      out.write("                border-style: solid;\n");
      out.write("                border-color: black;\n");
      out.write("                width: 400px;\n");
      out.write("                height: 250px;\n");
      out.write("                position: relative;\n");
      out.write("                top: 300px;\n");
      out.write("                text-align: center;\n");
      out.write("                padding-top: 30px;\n");
      out.write("                left: 530px;\n");
      out.write("                border-width: 20px;\n");
      out.write("\n");
      out.write("            }\n");
      out.write("            .textBox\n");
      out.write("            {\n");
      out.write("                background-color: #9999ff;\n");
      out.write("                border-style: none;\n");
      out.write("                height: 25px;\n");
      out.write("\n");
      out.write("            }\n");
      out.write("            .buttons\n");
      out.write("            {\n");
      out.write("                color: grey;\n");
      out.write("                background-color: black;\n");
      out.write("                border-style: none;\n");
      out.write("                height: 30px;\n");
      out.write("                width: 80px;\n");
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
      out.write("        <script>\n");
      out.write("            function create()\n");
      out.write("            {\n");
      out.write("                location.href = \"create.jsp\";\n");
      out.write("            }\n");
      out.write("        </script>\n");
      out.write("    </head>\n");
      out.write("    <body>\n");
      out.write("    <center>\n");
      out.write("        <div>\n");
      out.write("            <h2 class=\"header\">NATIONAL BANK OF INDIA</h2>\n");
      out.write("        </div>\n");
      out.write("    </center>\n");
      out.write("    <div class=\"loginDiv\">\n");
      out.write("        <h5 style=\"font-weight: bold;font-size: 20px;position: relative;top: -50px;\">LOGIN</h5>\n");
      out.write("        <form method=\"post\" action=\"");
      out.print( request.getRequestURL());
      out.write("\">\n");
      out.write("            <table style=\"position: relative; left: 60px;top: -50px;\">\n");
      out.write("                <tr><td>Account No:  <input class=\"textBox\" type=\"text\" name=\"accno\"><br/><br/></td></tr>\n");
      out.write("                <tr><td>Password : <input class=\"textBox\" style=\"position: relative; left: 10px;\" type=\"password\" name=\"password\"><br/><br/></td></tr>\n");
      out.write("            \n");
      out.write("            <tr><td>Account Type : <select name=\"type\" class=\"textBox\">\n");
      out.write("                <option value=\"admin\">Admin</option>\n");
      out.write("                <option value=\"customer\">Customer</option>\n");
      out.write("            </select>\n");
      out.write("                </table>\n");
      out.write("            <input class=\"buttons\" style=\"position: relative; top: -40px;\" type=\"submit\" value=\"LOGIN\">\n");
      out.write("        </form>\n");
      out.write("    </div>\n");
      out.write("    ");


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

    
      out.write("\n");
      out.write("    <button class=\"buttons\" style=\"text-decoration: none;position: relative;left: 680px; top: 245px;width: 150px;\" onclick=\"create()\">CREATE ACCOUNT</button>\n");
      out.write("</body>\n");
      out.write("</html>\n");
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
