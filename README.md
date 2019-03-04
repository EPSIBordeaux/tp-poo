# TP n°1 sur la POO avec PHP

1. Démarrer le projet 

    ```
    docker-compose up -d
    ```

3. Lancer les tests unitaires

    ```
    docker exec tp-poo composer test
    ```

## Potentielles erreurs

1. `Cannot delete /some-random-folder/.git/truc.idx`
    - Solution : supprimer le dossier `vendor` et refaire la commande d'installation.

## Lancement de docker sous Windows 10 Famille / Education

Pré-requis : Virtualbox.

1. Installer [Docker Toolbox](https://docs.docker.com/toolbox/toolbox_install_windows/)

2. Installer [Git Bash](https://git-scm.com/download/win)

2. Lancer Kitematic pour démarrer une machine virtuelle permettant de lancer des conteneurs.

3. Lancer Git Bash

4. Les commandes `docker` et `docker-compose` devraient désormais être accessible
