public interface IPerson
{
    // Properties for storing personal details
    string Fname { get; set; }
    string Lname { get; set; }
    string Mname { get; set; }
    DateTime Birthday { get; set; }
    string EmailAddress { get; set; }

    // Methods
    string GetName(); // Returns full name
    void SetName(string fname, string lname, string mname); // Sets full name
}

using System;

public abstract class Person : IPerson
{
    // Properties from the IPerson interface
    public string Fname { get; set; }
    public string Lname { get; set; }
    public string Mname { get; set; }
    public DateTime Birthday { get; set; }
    public string EmailAddress { get; set; }

    // Get the full name
    public string GetName()
    {
        return $"{Fname} {Mname} {Lname}";
    }

    // Set the full name
    public void SetName(string fname, string lname, string mname)
    {
        Fname = fname;
        Lname = lname;
        Mname = mname;
    }

    // Abstract method to display role, to be implemented by derived classes
    public abstract void DisplayRole();
}

using System;

public class Admin : Person
{
    public void Create()
    {
        Console.WriteLine($"{GetName()} is creating a user.");
    }

    public void Update()
    {
        Console.WriteLine($"{GetName()} is updating a user.");
    }

    public void Delete()
    {
        Console.WriteLine($"{GetName()} is deleting a user.");
    }

    public override void DisplayRole()
    {
        Console.WriteLine($"{GetName()} is an Admin.");
    }
}

using System;

public class Student : Person
{
    public void Study()
    {
        Console.WriteLine($"{GetName()} is studying.");
    }

    public override void DisplayRole()
    {
        Console.WriteLine($"{GetName()} is a Student.");
    }
}

using System;

public class Program
{
    public static void Main()
    {
        // Create instances of Admin, Student, and Employee
        Admin admin = new Admin();
        admin.SetName("John", "Doe", "A");
        admin.Birthday = new DateTime(1980, 1, 1);
        admin.EmailAddress = "admin@example.com";

        Student student = new Student();
        student.SetName("Jane", "Smith", "B");
        student.Birthday = new DateTime(2000, 5, 15);
        student.EmailAddress = "student@example.com";

        Employee employee = new Employee();
        employee.SetName("Alice", "Johnson", "C");
        employee.Birthday = new DateTime(1990, 10, 10);
        employee.EmailAddress = "employee@example.com";

        // Display user roles and call their methods
        admin.DisplayRole();
        admin.Create();
        admin.Update();
        admin.Delete();

        student.DisplayRole();
        student.Study();

        employee.DisplayRole();
        employee.Teach();
        employee.AdminWork();
    }
}

