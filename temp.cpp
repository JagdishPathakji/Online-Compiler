#include <iostream>
using namespace std;

class customer {
    
    string name;
    int acno,bal;

public:
    // DEFAULT CONSTRUCTOR
    // customer() {
    //     cout<<"Hello Constructor"<<endl;    
    // }

    // PARAMETERIZED CONSTRUCTOR
    customer(string a, int b, int c) {
        name = a;
        acno = b;
        bal = c;
    }

    // When functions have same name but takes different parameter, then it is called constructor overloading or function overloading.
    customer(string a, int b) {
        name = a;
        acno = b;
        bal = 50;
    }

    // Inline Constructor
    // inline customer(string a, int b, int c) : name(a),acno(b),bal(c){}


    // Copy Constructor
    customer(customer &B) {
        name = B.name;
        acno = B.acno;
        bal = B.bal;
    }

    // Default constructor for A4
    customer() {

    }

    // To print the values
    void display() {
        cout<<name<<" "<<acno<<" "<<bal<<endl;
    }
};

int main() {

    customer A1("Rohit",1234,1000);
    customer A2("Mohit",4321);
    customer A3(A1);
    customer A4;

    A1.display();
    A2.display();
    A3.display();

    // Value Assignement with Assignment Operator
    A4 = A1;
    A4.display();

}
