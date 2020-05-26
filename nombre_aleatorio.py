import os, random

def nombres_ale():

    Pri_Nombre=["Juan","Carlos","Pedro","Lucas","Santiago","Manuel","Jose","Jesus","Antonio","Eddy"]
    Seg_Nombre=["Oscar","Robert","Samuel","Jesus","Frederick","Randy","Pedro","Kiko","Leonel","Luis"]

    Pri_apellido=["Diaz","Adrian","Abreu","Gomez","Fernandez","Suarez","Guzman","Rosario","Teruel","Duarte"]
    Seg_apellido=["Gomez","Mercedez","De Olio","Cruz","Alejo","Alvarez","Medrano","Ogando","Cohen","Vargas"]

    ale_pri_nombre=random.randint(0,9)
    ale_segu_nombre=random.randint(0,9)
    ale_pri_apellido=random.randint(0,9)
    ale_segu_apellido=random.randint(0,9)
    """
    for a in Pri_Nombre:
        for bb in Seg_Nombre:
            for c in Pri_apellido:
                for d in Seg_apellido:

                    print(a+" "+bb+" "+c+" "+d)

    """


    nombre=(Pri_Nombre[ale_pri_nombre]+" "+Seg_Nombre[ale_segu_nombre])+" "+Pri_apellido[ale_pri_apellido]+" "+Seg_apellido[ale_segu_apellido]
    return nombre

def main():
    
    nombre=nombres_ale()
    print(nombre,"\n\n\n")

if __name__ == '__main__':
    os.system("cls")
    main()