export class User 
{
    constructor(_user) {
        this.id = _user.id;
        this.lastname = _user.lastname;
        this.firstname = _user.firstname;
        this.birthday = _user.birthday;
        this.salary = _user.salary;
        this.password = _user.password;

        // Copie l'objet _user dans l'objet actuel (this)
        //Object.assign(this, _user);

        // Générer le login à partir du prénom et du nom
        this.login = _user.firstname + '.' + _user.lastname;

        // Générer l'email à partir du login
        this.email = this.login + '@example.com';

        this.isLogged = false; // identifié ou non
    }

    login(username, password) {
        this.isLogged = (username === this.login && password === this.password);
    }
}
