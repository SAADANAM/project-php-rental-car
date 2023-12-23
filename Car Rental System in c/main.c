#include <stdio.h>
#include <stdlib.h>
#include <conio.h>
FILE * fp;
typedef struct date{
 int jour;
 int mois ;
 int annee ;
 }date;
typedef struct voiture
{
    int NI;//numéro d’immatriculation
    char mar[10];//marque
    char type[10];//
    int PLJ;// prix de location journalier
    date DMC; //date de mise en circulation
}voiture;
typedef struct client {
    int cin;
    char nom[10];
    char prenom[10];
    char ville[10];
    int ndp;//Numéros de permis
    int ndt;//Numéros Tél
    date ddn;//dates de naissance
}client;
typedef struct location{
    int cin1;
    int mat1;
    date ddm;//dates de location
    int dej;//durée en jours
}location;

FILE * fp;
 //int choix,cpt=0,cpt1=5,cpt2=5;
   // client *cl;
   // voiture *vo;
   // location *lo;

void menu (void);
void ajouter_d_un_client (client*);
void ajouter_d_un_voiture (voiture*);
void ajouter_d_un_location (location*);


    void ajouter_d_un_client (client *cl)
{

    //cl=(client*)realloc(cpt,sizeof(client));
    //cl=realloc(cl,cpt*sizeof(client));
    int tr=0;
    int k;
    fp=fopen("client.txt","at+");
    if(fp==NULL)
    {
        printf("inpossible d'ouvrir le fichier \n");
        exit(1);
    }
    fflush(stdin);
    printf("donner le cin du client\n");
    scanf("%d",&cl->cin);

    k=(cl->cin);
   while(!feof(fp)){
        fscanf(fp,"%d\n%s\n%s\n%s\n%d\n%d\n%d\n%d\n%d\n",&cl->cin,&cl->nom,&cl->prenom,&cl->ville,&cl->ndp,&cl->ndt,&cl->ddn.jour,&cl->ddn.mois,&cl->ddn.annee);
    if(cl->cin==k){
        tr=0;
        break;
    }
}
    if(tr==1)
        printf("le client existe deja!!!!\n ");
    else{
    //printf("donner votre cin\n");
  //  gets(cl->cin);
    fflush(stdin);
    printf("donner votre nom\n");
    gets(cl->nom);
    fflush(stdin);
    printf("donner votre prenom\n");
    gets(cl->prenom);
    fflush(stdin);
    printf("donner votre ville\n");
    gets(cl->ville);
    fflush(stdin);
    printf("donner votre Numeros de permis \n");
    scanf("%d",&cl->ndp);
    fflush(stdin);
    printf("donner votre Numeros Tél\n");
    scanf("%d",&cl->ndt);
    fflush(stdin);
    printf("donner votre dates de naissance\n");
    scanf("%d%d%d",&cl->ddn.jour,&cl->ddn.mois,&cl->ddn.annee);
    fflush(stdin);
    fprintf(fp,"%s\n%s\n%s\n%s\n%d\n%d\n%d\n%d\n%d\n",&cl->cin,&cl->nom,&cl->prenom,&cl->ville,cl->ndp,cl->ndt,cl->ddn.jour,cl->ddn.mois,cl->ddn.annee);

    }
 	fclose(fp);
 }
        void ajouter_d_un_voiture (voiture *vo){
        int tr=0;
        int o;
        fp=fopen("voiture.txt","at+");
        if(fp==NULL){
        printf("inpossible d'ouvrir le fichier \n");
        exit(1);

        }
        fflush(stdin);
        printf("donner votre numéro d’immatriculation\n");
        scanf("%d",&vo->NI);
        o=vo->NI;
        while(!feof(fp)){
             fscanf(fp,"%d\n%s\n%s\n%d\n%d\n%d\n%d\n",&vo->NI,&vo->mar,&vo->type,&vo->PLJ,&vo->DMC.jour,&vo->DMC.mois,&vo->DMC.annee);
        if(vo->NI==o){
        tr=0;
        break;
        }
        }
        if(tr==1)
        printf("la voiture est existe deja!!!!\n ");
        else{
        fflush(stdin);
        printf("donner la marque du voiture\n");
        gets(vo->mar);
        // fflush(stdin);
        printf("donner sont type\n");
        gets(vo->type);
        // fflush(stdin);
        printf("donner prix de location journalier\n");
        scanf("%d",&vo->PLJ);
        //fflush(stdin);
        printf("donner date de mise en circulation\n");
        scanf("%d%d%d",&vo->DMC.jour,&vo->DMC.mois,&vo->DMC.annee);
        // fflush(stdin);
         fprintf(fp,"%d\n%s\n%s\n%d\n%d\n%d\n%d\n",vo->NI,&vo->mar,&vo->type,vo->PLJ,vo->DMC.jour,vo->DMC.mois,vo->DMC.annee);


        }
        fclose(fp);


    }
    void ajouter_d_un_location (location*lo){
        int tr=0;
        int l;
        fp=fopen("location.txt","at+");
        if(fp==NULL){
        printf("inpossible d'ouvrir le fichier \n");
        exit(1);
        }
        fflush(stdin);
        printf("donner le CIN du client\n");
        scanf("%d",&lo->cin1);
        fflush(stdin);
        printf("donner le Numéro d’immatriculation du véhicule loué\n");
        scanf("%d",&lo->mat1);
        fflush(stdin);
        printf("donner la date de location\n");
        scanf("%d%d%d",&lo->ddm.jour,&lo->ddm.mois,&lo->ddm.annee);
        fflush(stdin);
        printf("donner la durée en jours de la location\n");
        scanf("%d",&lo->dej);
        fprintf(fp,"%d\n%d\n%d\n%d\n%d\n%d\n",lo->cin1,lo->mat1,lo->ddm.jour,lo->ddm.mois,lo->ddm.annee,lo->dej);
        fclose(fp);








    }
    void Affichage_de_la_liste_des_voitures(voiture *vo){
        int tr=0;
        char p;
        char mar1[10];
        char typ1[10];
        fp=fopen("voiture.txt","rt");
         if(fp==NULL){
        printf("inpossible d'ouvrir le fichier \n");
        exit(1);

        }
        fflush(stdin);
        printf("a ou b ou c\n");
        scanf("%c",&p);
        fflush(stdin);
        if(p=='a'){
        printf("----------------------------------------Toutes les voitures-----------------------------------------------\n");

        while(!feof(fp)){
        fscanf(fp,"%d\n%s\n%s\n%d\n%d\n%d\n%d\n",&vo->NI,&vo->mar,&vo->type,&vo->PLJ,&vo->DMC.jour,&vo->DMC.mois,&vo->DMC.annee);

        printf(" numéro d’immatriculation est : %d\n\n",vo->NI);
        printf(" la marque du voiture est : %s\n\n",&vo->mar);
        printf("type du voiture est : %s\n\n",&vo->type);
        printf("prix de location journalier est : %d \n\n",vo->PLJ);
        printf("la date de mise en circulation %d/%d/%d \n\n",vo->DMC.jour,vo->DMC.mois,vo->DMC.annee);
        }



        }
        else if (p=='b'){
                printf("--------------------------------------Par marque----------------------------------------------------\n");

                printf("donner la marque du voiture\n");
                gets(mar1);
                while(!feof(fp)){
        fscanf(fp,"%d\n%s\n%s\n%d\n%d\n%d\n%d\n",&vo->NI,&vo->mar,&vo->type,&vo->PLJ,&vo->DMC.jour,&vo->DMC.mois,&vo->DMC.annee);
       // tr=strcmp(vo->mar,mar1);
       // printf("%d\n",tr);
        tr=0;
        if(strcmp(vo->mar,mar1)==0){
            tr=1;
        printf(" numéro d’immatriculation est : %d\n\n",vo->NI);
        printf(" la marque du voiture est : %s\n\n",&vo->mar);
        printf("type du voiture est : %s\n\n",&vo->type);
        printf("prix de location journalier est : %d \n\n",vo->PLJ);
        printf("la date de mise en circulation %d/%d/%d \n\n",vo->DMC.jour,vo->DMC.mois,vo->DMC.annee);
        }


}
      if(tr==0){
              printf("la marque n existe pas\n");
        }
}
        else if (p=='c'){
        printf("--------------------------------------------Par type-----------------------------------------\n");
        printf("donner le type du voiture\n");
                gets(typ1);
                while(!feof(fp)){
        fscanf(fp,"%d\n%s\n%s\n%d\n%d\n%d\n%d\n",&vo->NI,&vo->mar,&vo->type,&vo->PLJ,&vo->DMC.jour,&vo->DMC.mois,&vo->DMC.annee);
       // tr=strcmp(vo->mar,mar1);
       // printf("%d\n",tr);
        tr=0;
        if(strcmp(vo->type,typ1)==0){
            tr=1;
        printf(" numéro d’immatriculation est : %d\n\n",vo->NI );
        printf(" la marque du voiture est : %s\n\n",&vo->mar);
        printf("type du voiture est : %s\n\n",&vo->type);
        printf("prix de location journalier est : %d \n\n",vo->PLJ);
        printf("la date de mise en circulation %d/%d/%d \n\n",vo->DMC.jour,vo->DMC.mois,vo->DMC.annee);
        }


        }
          if(tr==0){
              printf("le type n existe pas\n");
        }

        }




        else
            printf("tu dois choisire a ou b ou c \n");














    }

     void Affichage_de_la_liste_des_clients(client *cl){
        int tr=0;
        char p;
        int cin1;
        char vil1[10];
        fp=fopen("client.txt","rt");
         if(fp==NULL){
        printf("inpossible d'ouvrir le fichier \n");
        exit(1);

        }
        fflush(stdin);
        printf("a ou b ou c\n");
        scanf("%c",&p);
        fflush(stdin);
        if(p=='a'){
        printf("----------------------------------------Tous les clients-----------------------------------------------\n");

        while(!feof(fp)){
       fscanf(fp,"%d\n%s\n%s\n%s\n%d\n%d\n%d\n%d\n%d\n",&cl->cin,&cl->nom,&cl->prenom,&cl->ville,&cl->ndp,&cl->ndt,&cl->ddn.jour,&cl->ddn.mois,&cl->ddn.annee);

        printf(" le cin est : %d\n\n",cl->cin);
        printf(" le nom est  :%s\n\n",&cl->nom);
        printf(" le prenom est :%s\n\n",&cl->prenom);
        printf(" la ville est :%s\n\n",&cl->ville);
        printf("le Numeros de permis est :%d\n\n",cl->ndp);
        printf("le Numeros Tél :  %d\n\n ",cl->ndt);
        printf("la dates de naissance est : %d/%d/%d\n\n\n",cl->ddn.jour,cl->ddn.mois,cl->ddn.annee);
        }



        }
        else if (p=='b'){
                printf("--------------------------------------Par CIN----------------------------------------------------\n");

                printf("donner le cin\n");
                scanf("%d",&cin1);
                while(!feof(fp)){
        fscanf(fp,"%d\n%s\n%s\n%s\n%d\n%d\n%d\n%d\n%d\n",&cl->cin,&cl->nom,&cl->prenom,&cl->ville,&cl->ndp,&cl->ndt,&cl->ddn.jour,&cl->ddn.mois,&cl->ddn.annee);
       // tr=strcmp(vo->mar,mar1);
       // printf("%d\n",tr);
        tr=0;
        if((cl->cin)==cin1){
            tr=1;
        printf(" le cin est :%d \n\n",cl->cin);
        printf(" le nom est  :%s\n\n",&cl->nom);
        printf(" le prenom est :%s\n\n",&cl->prenom);
        printf(" la ville est :%s\n\n",&cl->ville);
        printf("le Numeros de permis est :%d\n\n",cl->ndp);
        printf("le Numeros Tél : %d \n\n ",cl->ndt);
        printf("la dates de naissance est : %d/%d/%d\n\n\n",cl->ddn.jour,cl->ddn.mois,cl->ddn.annee);
        }


}
      if(tr==0){
              printf("le CIN n existe pas\n");
        }
}
        else if (p=='c'){
        printf("--------------------------------------------Par ville-----------------------------------------\n");
        printf("donner la ville :\n");
                gets(vil1);
                while(!feof(fp)){
        fscanf(fp,"%d\n%s\n%s\n%s\n%d\n%d\n%d\n%d\n%d\n",&cl->cin,&cl->nom,&cl->prenom,&cl->ville,&cl->ndp,&cl->ndt,&cl->ddn.jour,&cl->ddn.mois,&cl->ddn.annee);
       // tr=strcmp(vo->mar,mar1);
       // printf("%d\n",tr);
        tr=0;
        if(strcmp(cl->ville,vil1)==0){
            tr=1;
        printf(" le cin est  : %d\n\n",cl->cin);
        printf(" le nom est :%s \n\n",&cl->nom);
        printf(" le prenom est :%s\n\n",&cl->prenom);
        printf(" la ville est :%s\n\n",&cl->ville);
        printf("le Numeros de permis est :%d\n\n",cl->ndp);
        printf("le Numeros Tél : %d \n\n ",cl->ndt);
        printf("la dates de naissance est :%d%d%d\n\n\n",cl->ddn.jour,cl->ddn.mois,cl->ddn.annee);
        }


        }
          if(tr==0){
              printf("la ville n existe pas\n");
        }

        }




        else
            printf("tu dois choisire a ou b ou c \n");














    }

    void Affichage_de_la_liste_des_locations(location *lo,client *cl,voiture *vo){

        int tr=0,tr1=0,cin2,mat2,dej1;
        char p;
        char nom1[10];

     //   fp=fopen("location.txt","rt");
     //   if(fp==NULL){
     //   printf("inpossible d'ouvrir le fichier \n");
     //   exit(1);

     //   }
        fflush(stdin);
        printf("a ou b ou c ou d\n");
        scanf("%c",&p);
        fflush(stdin);
        if(p=='a'){
            fp=fopen("client.txt","rt");
            if(fp==NULL){
            printf("inpossible d'ouvrir le fichier \n");
            exit(1);

            }
            printf("--------------------------------------Par NOM----------------------------------------------------\n");
            printf("donner le nom :\n");
            gets(nom1);
             while(!feof(fp)){
        fscanf(fp,"%d\n%s\n%s\n%s\n%d\n%d\n%d\n%d\n%d\n",&cl->cin,&cl->nom,&cl->prenom,&cl->ville,&cl->ndp,&cl->ndt,&cl->ddn.jour,&cl->ddn.mois,&cl->ddn.annee);
        tr=0;
        if(strcmp(cl->nom,nom1)==0){
            tr=1;
        cin2=cl->cin;
        fp=fopen("location.txt","rt");
            if(fp==NULL){
            printf("inpossible d'ouvrir le fichier \n");
            exit(1);

            }
            while(!feof(fp)){
        fscanf(fp,"%d\n%d\n%d\n%d\n%d\n%d\n",lo->cin1,lo->mat1,lo->ddm.jour,lo->ddm.mois,lo->ddm.annee,lo->dej);
        tr1=0;
        if(cin2==lo->cin1){
            tr1=1;
        printf(" le cin est : %d \n\n",lo->cin1);
        printf(" le Numéro d’immatriculation du véhicule loué est  : %d \n\n",lo->mat1);
        printf(" la dates de location est :%d/%d/%d\n\n",lo->ddm.jour,lo->ddm.mois,lo->ddm.annee);
        printf(" la durée en jours est : %d\n\n",lo->dej);
        }


        }
          if(tr1==0){
              printf("la location n existe pas\n");
        }





        }




        }

        if(tr==0){
              printf("le nom n existe pas\n");
        }
        }

         else if(p=='b'){
            fp=fopen("location.txt","rt");
            if(fp==NULL){
            printf("inpossible d'ouvrir le fichier \n");
            exit(1);

            }
                printf("--------------------------------------Par Immatriculation----------------------------------------------------\n");

                printf("donner la dej\n");
                scanf("%d",&mat2);
                while(!feof(fp)){
                fscanf(fp,"%d\n%d\n%d\n%d\n%d\n%d\n",lo->cin1,lo->mat1,lo->ddm.jour,lo->ddm.mois,lo->ddm.annee,lo->dej);
                tr=0;
                if((lo->mat1)==mat2){
                    tr=1;
                printf(" le cin est : %d \n\n",lo->cin1);
                printf(" le Numéro d’immatriculation du véhicule loué est  : %d \n\n",lo->mat1);
                printf(" la dates de location est :%d/%d/%d\n\n",lo->ddm.jour,lo->ddm.mois,lo->ddm.annee);
                printf(" la durée en jours est : %d\n\n",lo->dej);
                }


        }
              if(tr==0){
                      printf("la location n existe pas\n");
                }
                }
                else if(p=='c'){
            fp=fopen("location.txt","rt");
            if(fp==NULL){
            printf("inpossible d'ouvrir le fichier \n");
            exit(1);

            }
                printf("--------------------------------------Par duree----------------------------------------------------\n");

                printf("donner la duree \n");
                scanf("%d",&dej1);
                while(!feof(fp)){
                fscanf(fp,"%d\n%d\n%d\n%d\n%d\n%d\n",lo->cin1,lo->mat1,lo->ddm.jour,lo->ddm.mois,lo->ddm.annee,lo->dej);
                tr=0;
                if((lo->dej)==dej1){
                    tr=1;
                printf(" le cin est : %d \n\n",lo->cin1);
                printf(" le Numéro d’immatriculation du véhicule loué est  : %d \n\n",lo->mat1);
                printf(" la dates de location est :%d/%d/%d\n\n",lo->ddm.jour,lo->ddm.mois,lo->ddm.annee);
                printf(" la durée en jours est : %d\n\n",lo->dej);
                }


        }
              if(tr==0){
                      printf("la duree %d n existe pas\n",dej1);
                }
                }
        }















































void menu (){
printf("----------------------------------------MENU---------------------------------------\n");
printf("1. Ajouter un nouveau client :\n");
printf("2. Ajouter une nouvelle voiture :\n");
printf("3. Ajouter une nouvelle location :\n");
printf("4. Affichage de la liste des voitures :\n");
printf("5. Affichage de la liste des clients :\n");
printf("6. Affichage de la liste locations :\n");
printf("7. Affichage de la liste des clients dont le nom par une lettre donnée :\n");
printf("9. Suppression d’un client par CIN :\n");
printf("10. Supprimer une voiture par son numéro d’immatriculation :\n");
printf("11. Supprimer tous les contacts d’une ville donnée :\n");
printf("12. Compter le nombre de contacts d’une ville donnée :\n");
printf("13. Le chiffre réalisé par une voiture donnée :\n");
printf("14. Afficher les informations de la voiture ayant réalisé le chiffre le plus élevé :\n");
printf("15. Quitter (exit(0)) :\n");
}

int main()
{

    int choix,cpt=0,cpt1=0,cpt2=0;
   client *cl;
    voiture *vo;
    location *lo;
        cl=(client*)malloc(0*sizeof(client));
        vo=(voiture*)malloc(0*sizeof(voiture));
        lo=(location*)malloc(0*sizeof(location));

            do{
           // clrscr();
            menu ();
            scanf("%d",&choix);
            switch(choix){
            case 1 :{cpt++;
                    cl=realloc(cl,cpt*sizeof(client));ajouter_d_un_client(cl);break;}
            case 2 :{cpt1++;
                    vo=realloc(vo,cpt1*sizeof(voiture));ajouter_d_un_voiture (vo);break;}
            case 3 :{cpt2++;
                    lo=realloc(lo,cpt2*sizeof(location));ajouter_d_un_location (lo);break;}
            case 4 :{Affichage_de_la_liste_des_voitures(vo);break;}
            case 5 :{Affichage_de_la_liste_des_clients(cl);break;}
            case 6 :{Affichage_de_la_liste_des_locations(lo,cl,vo);break;}
           // case 7 :{ajouter_d_un_client(cl,cpt);cpt++;break;}
           // case 8 :{ajouter_d_un_client(cl,cpt);cpt++;break;}
           // case 9 :{ajouter_d_un_client(cl,cpt);cpt++;break;}
            case 0 :{printf("fin de traitnent \n");break;}
            default :printf("choix errone !!!!! le choix entre [0 - 15]\n\n");}

           // getch();
            }while(choix!=0);


    return 0;

}



