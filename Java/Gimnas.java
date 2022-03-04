import java.security.NoSuchAlgorithmException;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.Scanner;

public class Gimnas {
    private String nom;
    private String CIF;
    private String telefon;
    private ArrayList<Client> clients;
    
    Scanner teclat = new Scanner(System.in);

    public void gestionarGimnas() throws SQLException, NoSuchAlgorithmException {
        boolean sortir = false;

        do {
            System.out.println("**********MENU GIMNAS**********");
            System.out.println("1. Gestió Clients");
            System.out.println("2. Sortir");     

        int opcio = teclat.nextInt();

        switch (opcio) {
            case 1:
                gestioClients();
                break;
            case 2:
                sortir = true;
                break;
            default:
                System.out.println("Valor no vàlid");
        }
        } while (!sortir);
    }

    private void gestioClients() throws SQLException, NoSuchAlgorithmException {
        boolean sortir = false;

        do {
            System.out.println("**********GESTIÓ CLIENTS**********");
            System.out.println("1. Visualitzar clients");
            System.out.println("2. Consultar clients");
            System.out.println("3. Alta client");
            System.out.println("4. Baixa client");
            System.out.println("5. Modificar client");
            System.out.println("6. Sortir");     

        int opcio = teclat.nextInt();

        switch (opcio) {
            case 1:
            visualitzarClients();
                break;
            case 2:
            consultaClient();
                break;
            case 3:
            altaClient();
                break;
            case 4:
                break;
            case 5:
                break;
            case 6:
                sortir = true;
                break;
            default:
                System.out.println("Valor no vàlid");
        }
        } while (!sortir);
    }

    private void consultaClient() throws SQLException {
        //Cridar metode consultarClient() a la classe Client.
        Client c = new Client();
        c.consultarClient();
    }

    //FER VALIDACIONS
    private void altaClient() throws SQLException, NoSuchAlgorithmException {
        Client c = new Client();
        c.altaClient();
    }

    public void visualitzarClients() throws SQLException {
        boolean sortir = false;
        Scanner teclat = new Scanner(System.in);
        do {
            System.out.println("Per quin criteri vols ordenar els clients?");
            System.out.println("1. Ordenats per cognom.");
            System.out.println("2. Ordenats per edat.");
            System.out.println("3. Ordenats per nº de reserves fetes.");
            System.out.println("4. Sortir.");

        int opcio = teclat.nextInt();
        Client c = new Client();

        switch (opcio) {
            case 1:
                this.clients = c.ordenarPerCognom();
                for (Client client : clients) {
                    System.out.println(client);
                }
                break;
            case 2:
                this.clients = c.ordenarPerEdat();
                break;
            case 3:
                this.clients = c.ordenarPerReserves();
                for (Client client : clients) {
                    System.out.println(client);
                }

                break;
            case 4:
                sortir = true;
                break;
            default:
                System.out.println("Valor no vàlid");
        }
        } while (!sortir);
    }
}

