#include <iostream>
#include <string>
#include <stdlib.h>
#include <ctime>
#include <vector>

using namespace std;

int main(void)
{

    char exit;

    while (exit != 'x')
    {
    double capital=0;
    int ibet_amt=0, cbet_amt=0, bet_no=1, total_loss=0, total_goals;
    cout << "Initial Capital" << endl;
    cin >> capital;
    cout << "First bet amount" <<endl;
    cin >> ibet_amt;
    cbet_amt = ibet_amt;

    srand(time(NULL));

    while (capital>= cbet_amt)
    {
        total_goals = rand( ) % 2;

        if (total_goals == 1)
        {
            capital = capital - cbet_amt + (cbet_amt * 1.82) ;
            cout << "WIN" << ", Capital = " << capital << " Bet amt = " << cbet_amt << " No.of bet = " << bet_no << ", " << total_goals << endl;
            cbet_amt = ibet_amt;
            total_loss = 0;
            bet_no++;

        }
        else
        {
            capital = capital - cbet_amt;
            total_loss = total_loss + cbet_amt;
            cout << "LOSE" << ", Capital = " << capital << " Bet amt = " << cbet_amt << " No.of bet = " << bet_no << ", " << total_goals << endl;
            cbet_amt =  2 * total_loss;
            bet_no++;
        }
    }
    cout << "Again? or x to exit" << endl;
    cin >> exit;
    }


    return 0;
}
