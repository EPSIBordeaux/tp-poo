# TP n°1 sur la POO avec PHP

1. Démarrer le projet 

    ```
    docker-compose up -d
    ```

2. Installer les dépendances composer

    ```
    docker exec tp-poo composer install
    ```

3. Lancer les tests unitaires

    ```
    docker exec tp-poo composer test
    ```

## Potentielles erreurs

1. `Cannot delete /some-random-folder/.git/truc.idx`
    - Solution : supprimer le dossier `vendor` et refaire la commande d'installation.
