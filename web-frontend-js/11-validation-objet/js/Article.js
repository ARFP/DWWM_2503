/**
 * Représente un article
 * @author Mike DEV <mdevoldere@example.com>
 * @version 1.0
 */
export class Article 
{
    /**
     * constructeur
     * @param {String} _nom Le nom de l'article
     * @param {Number} _prixHT Le prix Hors taxes de l'article
     * @param {Number} _tva  La TVA appliquée à l'article
     */
    constructor(_nom, _prixHT, _tva) {
        this.nom = _nom;
        this.prixHT = parseInt(_prixHT);
        this.tva = parseInt(_tva);
    }

    prixTTC() {
        return this.prixHT * (1 + this.tva / 100);
    }


}
