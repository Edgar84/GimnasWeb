import java.sql.*;

public class ConexionBDSingleton {

    // Propiedades
    private static Connection conn = null;
    private String driver;
    private String url;
    private String usuario;
    private String password;
 
    // Constructor
    private ConexionBDSingleton (){
 
        String url = "jdbc:mysql://localhost:3306/db_gimnas";
        String driver = "com.mysql.jdbc.Driver";
        String usuario = "root";
        String password = "root";
  
        try{
           Class.forName(driver);
           conn = DriverManager.getConnection(url, usuario, password);
         }
         catch(ClassNotFoundException | SQLException e){
               e.printStackTrace();
         }
    } // Fin constructor
 
    // Métodos
    public static Connection getConnection(){
  
        if (conn == null){

        }
  
        return conn;
    } // Fin getConnection
}