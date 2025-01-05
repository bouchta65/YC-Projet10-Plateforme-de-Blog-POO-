# Blog Platform Project

## Description
Ce projet de plateforme de blog est structuré en programmation orientée objet (OOP). Il permet aux utilisateurs de gérer, visualiser et interagir avec des articles de blog. La gestion des rôles, des tags, des commentaires, des likes et des fonctionnalités d'archivage est également incluse.  

---

## Fonctionnalités Principales

### Gestion des Articles
- Création, modification et suppression d'articles.
- Possibilité d'ajouter une image à chaque article.
- Association d'articles à des catégories et tags.
- Archivage des articles pour une organisation à long terme.

### Gestion des Tags
- Création, modification et suppression de tags par les administrateurs.
- Filtrage des articles par tag pour une navigation simplifiée.

### Système de Commentaires
- Les utilisateurs peuvent ajouter des commentaires.
- Gestion complète des commentaires (ajouter, modifier, supprimer).

### Système de Likes
- Les utilisateurs peuvent aimer les articles.
- Comptage des likes et dislikes pour chaque article.

### Gestion des Utilisateurs
- Rôles : Administrateur, Membre.
- Enregistrement des utilisateurs.
- Modération des articles, commentaires et utilisateurs par les administrateurs.

### Sécurité Intégrée
- Gestion sécurisée des sessions.
- Protection contre les attaques XSS, CSRF, et les injections SQL.
- Utilisation de `htmlspecialchars()` et de requêtes préparées.

---

## Structure des Classes
### Classes principales :
- **User**  
  Gestion des utilisateurs : enregistrement, mise à jour des informations, ajout d'articles, commentaires, likes, etc.  
- **Admin**  
  Rôle spécial pour la gestion des articles, tags, utilisateurs et commentaires.  
- **Article**  
  Contient les informations sur chaque article : titre, contenu, image, statut, etc.  
- **Tags**  
  Permet de classer les articles selon des mots-clés.  
- **Commentaire**  
  Gestion des commentaires associés aux articles.  
- **Likes**  
  Gestion des appréciations des articles (likes/dislikes).  
- **Archive**  
  Gestion des articles archivés pour une meilleure organisation.  

### Relations entre les classes :
- Un **Utilisateur** peut avoir plusieurs **Articles** et **Commentaires**.
- Un **Article** peut avoir plusieurs **Tags** et **Likes**.
- Un **Admin** hérite des privilèges des **Utilisateurs** tout en ayant des responsabilités supplémentaires.
- Un **Utilisateur** peut interagir avec plusieurs **Commentaires** et **Likes**.

---

## Diagrammes
- **ERD (Diagramme Entité-Relation)** : Voir le fichier `src/db//ERD.png`.  
- **Diagramme UML (Diagramme de Classes)** : Voir le fichier `src/db/ClassDiagram.png`.
- **Diagramme UML (Use Case)** : Voir le fichier `src/db/Use_Case3.png`.

