
import javax.swing.*;

public class Dashboard extends JFrame 
{
    public Dashboard(String role) 
    {
        setTitle(role + " Dashboard");
        setSize(800, 600);
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        setLocationRelativeTo(null);
        add(new JLabel("Welcome to " + role + " Dashboard!", SwingConstants.CENTER));
        setVisible(true);
    }
}
