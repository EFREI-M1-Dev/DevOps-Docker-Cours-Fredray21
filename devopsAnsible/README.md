# DevOps : Ansible

## Introduction
Cours de DevOps sur Ansible, objectif :
- Créer 2 VMs debian (1 machine admin, 1 machine cible)
- Installer Ansible sur la machine admin
- Configurer Ansible pour qu'il puisse se connecter à la machine cible
- Tester la connection entre la machine admin et la machine cible
- Créer un playbook Ansible pour installer un serveur web sur la machine cible

## Prérequis
- VirtualBox / VMWare / Hyper-V / Parallels
- Ansible
- Python in VM admin

## Processus
- Après avoir créé les 2 VMs, il faut installer Ansible sur la machine admin > [Install Ansible](https://docs.ansible.com/ansible/latest/installation_guide/intro_installation.html#pipx-install)

- Puis configurer Ansible pour qu'il puisse se connecter à la machine cible.
#### Pour cela, il faut créer un fichier hosts dans le dossier /etc/ansible/hosts et y ajouter les lignes suivantes :
```
all:
  hosts:
    <IP_MACHINE_CIBLE>:
      ansible_connection: ssh
      ansible_ssh_user: <USER_MACHINE_CIBLE>
      ansible_ssh_pass: <PASSWORD_MACHINE_CIBLE>
```

- Ensuite, il faut tester la connection entre la machine admin et la machine cible avec la commande suivante :
```
ansible all -m ping
```
Pour voir les logs :
```
ansible all -m ping -vvvv
```

- Si la connection est établie, il faut créer un playbook Ansible pour installer un serveur web sur la machine cible.
- Pour cela, il faut créer un fichier playbook.yml dans le dossier /etc/ansible/ et y ajouter les lignes suivantes :
```
- name: Apache serveur web
  hosts: <IP_MACHINE_CIBLE>
  become: yes

  tasks:
    - name: Apache last ver
      apt:
        name: apache2
        state: latest

    - name: Start apache
      service:
        name: apache2
        state: started
        enabled: yes
```

- Enfin, il faut lancer le playbook avec la commande suivante et rentrer le mot de passe de la VM Cible.
```
ansible-playbook playbook.yml --ask-become-pass
```