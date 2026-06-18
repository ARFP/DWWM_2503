

# ✅ STRATÉGIE RECOMMANDÉE (PRO)

👉 **Ne jamais importer toute la table `wp_options`**

***

# 🧩 Méthode 1 — Migration contrôlée (RECOMMANDÉE)

## 1. Export local SANS `wp_options`

Avec `mysqldump` :

```bash
mysqldump -u root -p db_local \
--ignore-table=db_local.wp_options \
> dump.sql
```

***

## 2. Import sur prod

```bash
mysql -u user -p db_prod < dump.sql
```

***

## 3. Synchroniser uniquement certaines options utiles

Créer un export partiel :

```sql
SELECT * FROM wp_options 
WHERE option_name IN (
  'siteurl',
  'home',
  'blogname',
  'blogdescription'
);
```

👉 Puis adapter à la prod si nécessaire.

***

## 🚨 IMPORTANT

**NE PAS importer :**

```text
elementor_pro_license_data
elementor_pro_license_key
elementor_pro_license_status
```

***

# 🧩 Méthode 2 — Suppression ciblée avant import

Si tu importes toute la base (cas rapide) :

## Étapes :

### 1. Export local complet

### 2. Modifier le dump (`.sql`)

Supprimer les lignes contenant :

```sql
elementor_pro_license_data
elementor_pro_license_key
elementor_pro_license_status
```

***

### 3. Import en prod

👉 La licence déjà présente en prod reste intacte ✅

***

# 🧩 Méthode 3 — Sauvegarde/restauration (SAFE)

## 1. En prod (avant import)

Sauvegarde licence :

```sql
SELECT * FROM wp_options 
WHERE option_name LIKE 'elementor_pro_license%';
```

***

## 2. Après import

Réinjecter :

```sql
INSERT INTO wp_options (option_name, option_value, autoload)
VALUES ('elementor_pro_license_data', '...', 'yes');
```

***

# 🧠 BONNES PRATIQUES CDA

## ✅ Toujours exclure :

* `wp_options` (ou filtrer finement)
* `wp_users` (selon contexte)
* `wp_usermeta`

***

## ✅ Outils recommandés

### 🔹 WP-CLI (top en prod)

```bash
wp db export dump.sql
wp db import dump.sql
```

***

### 🔹 Plugins utiles

* WP Migrate DB Pro
* All-in-One WP Migration (attention aux options)
* Duplicator (config possible)

***

# 🔍 Vérification post-migration

## 1. Vérifier licence

Dans WP Admin :

```
Elementor → License
```

✅ doit afficher "Active"

***

## 2. Vérifier option en base

```sql
SELECT option_name FROM wp_options 
WHERE option_name LIKE '%elementor%';
```

***

# 💡 Astuce PRO (très important)

👉 Elementor stocke aussi des URLs dans la DB

Après migration, faire :

```bash
wp search-replace 'http://localhost' 'https://monsite.fr'
```

***

# ✅ Résumé rapide (à donner à tes apprenants)

✔ Ne jamais importer toute la table `wp_options`  
✔ Exclure les options Elementor licence  
✔ Utiliser une migration partielle  
✔ Vérifier la licence après déploiement

***

# 🎓 Bonus pédagogique (CDA)

## Cas réel entreprise

> Une agence travaille en local → déploie en prod → doit préserver les abonnements premium (Elementor, WooCommerce, API…)

👉 Donc :

* migration sélective
* gestion fine de la base
* automatisation via CI/CD

***

Si tu veux, je peux te faire :

✅ un **TP complet DWWM/CDA**  
✅ ou un **script WP-CLI automatisé de déploiement propre**  
✅ ou une **checklist DevOps migration WordPress**

Tu me dis 👍



Voici **la méthode propre et complète** pour remplacer `localhost:8098` par `toto.com` dans une base WordPress avec Elementor 👇

***

# Sauvegarde de la licence élémentor 



# Méthode recommandée (safe Elementor)

## Avec WP-CLI (idéal)

```bash
wp search-replace 'http://localhost:8098' 'https://toto.com' --all-tables
```

Avantages :
* Gère correctement JSON + données sérialisées
* Passe dans **toutes les tables**
* Évite la casse Elementor

***

# Méthode SQL (à faire si pas de WP-CLI)

## 1. Elementor (CRITIQUE)

```sql
UPDATE wp_postmeta
SET meta_value = REPLACE(meta_value, 'http://localhost:8098', 'https://toto.com')
WHERE meta_key = '_elementor_data';
```

***

## 🔹 2. Contenu classique WordPress

```sql
UPDATE wp_posts
SET post_content = REPLACE(post_content, 'http://localhost:8098', 'https://toto.com');
```

***

## 🔹 3. Options (thèmes / Elementor global)

```sql
UPDATE wp_options
SET option_value = REPLACE(option_value, 'http://localhost:8098', 'https://toto.com');
```

***

## 🔹 4. Métadonnées générales

```sql
UPDATE wp_postmeta
SET meta_value = REPLACE(meta_value, 'http://localhost:8098', 'https://toto.com');
```

***

# ⚠️ IMPORTANT (à ne PAS oublier)

## 🔥 1. Remplacer aussi sans http

Parfois Elementor stocke sans protocole :

```sql
UPDATE wp_postmeta
SET meta_value = REPLACE(meta_value, 'localhost:8098', 'toto.com');
```

***

## 🔥 2. Vider le cache Elementor

Ensuite dans WordPress :

👉 Elementor → Outils →

* ✅ Regenerate CSS
* ✅ Sync Library

***

## 🔥 3. Mettre à jour les URLs WP

Dans `wp_options` :

```sql
UPDATE wp_options SET option_value = 'https://toto.com' WHERE option_name = 'siteurl';
UPDATE wp_options SET option_value = 'https://toto.com' WHERE option_name = 'home';
```

***

# ⚠️ Attention

* Toujours faire un **dump SQL avant**
* Si tu as du contenu sérialisé (plugins autres qu’Elementor) → WP-CLI recommandé

***

# 🧠 TL;DR

👉 Le strict minimum :

```sql
UPDATE wp_postmeta SET meta_value = REPLACE(meta_value, 'localhost:8098', 'toto.com');
UPDATE wp_posts SET post_content = REPLACE(post_content, 'localhost:8098', 'toto.com');
UPDATE wp_options SET option_value = REPLACE(option_value, 'localhost:8098', 'toto.com');
```

***

Si tu veux, je peux te faire une **version ultra safe avec condition + backup + analyse avant exécution** 👍
