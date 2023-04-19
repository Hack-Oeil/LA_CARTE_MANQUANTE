import random

da1 = ""

# fonction obligatoire
def stdin():
    global da1
    a1 = []
    a3 = 'P,C,T,K-1,2,3,4,5,6,7,8,9,10,V,D,R'.split("-")
    a2 = a3[0].split(",")
    s2 = a3[1].split(",")
    for s1 in a2:
        for s3 in s2:
            a1.append(s3 + s1)
    nr = random.randint(0, len(a1)-1)
    da1 = a1[nr]
    del a1[nr]
    random.shuffle(a1)
    return a1

currentBuffer = ""

def stdout(data):
    global currentBuffer
    currentBuffer += data

# fonction obligatoire
def hoTryCode():
    global da1
    try:
        returnCard = main()
        if returnCard == da1:
            print(True)
        else:
            print(f"Votre code a retourne {returnCard}, la carte manquante etait {da1}")
    except Exception as e:
        print("Il y a une erreur dans votre code\n")
