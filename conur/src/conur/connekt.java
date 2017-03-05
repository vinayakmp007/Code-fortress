/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package conur;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.SQLException;
import java.sql.Statement;
/**
 *
 * @author root
 */
public class connekt {
    
    public static Connection con;
public static  Statement stmt;
public static PreparedStatement pstmt;
      public static void  conn()
    {
        try{  
    Class.forName("com.mysql.jdbc.Driver");  
            //here sonoo is database name, root is username and password
        con = DriverManager.getConnection(  
                    "jdbc:mysql://localhost:3306/u1",credentials.uname,credentials.pass); {
                //here sonoo is database name, root is username and password
                 stmt=con.createStatement(); 
                 
        
               /* ResultSet rs=stmt.executeQuery("select * from testcase");
                while(rs.next())
                    System.out.println(rs.getInt(1)+"  "+rs.getString(2)+"  "+rs.getString(3));  
         */   }
}catch( ClassNotFoundException | SQLException e){ System.out.println(e+"not there");}  

    }
    
}
