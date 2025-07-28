import os
import sys
import subprocess

# List of functions to disable
disabled_functions = ['exec', 'system', 'shell_exec', 'passthru', 'proc_open']

ctrl_code = "a"

# Chemin absolu du fichier en cours d'exécution
file_path = os.path.abspath(__file__)
# Répertoire contenant le fichier en cours d'exécution
dir_path = os.path.dirname(file_path)
with open(dir_path+'/controlCode.py', 'r') as f1:
    ctrl_code = f1.read()

# Load user code from file
with open(sys.argv[1], 'r') as f:
    user_code = f.read()

# Check if any disabled functions are used in the user code
for func in disabled_functions:
    if func in user_code:
        print(f"Function '{func}' is disabled.")
        exit()


# Execute the user code in a virtual machine and perform tests
nb_tests = 10
bad_response = False
return_data = []
for i in range(nb_tests):
    # Call hoTryCode() function and capture output
    cmd = ['python', '-c', ctrl_code+user_code+"\nhoTryCode()"]
   
    result = subprocess.run(cmd, stdout=subprocess.PIPE, stderr=subprocess.PIPE)
    output = result.stdout.decode('utf-8', errors='replace')
    return_data.append(output+"\n")

    if result.stdout.strip().decode('utf-8') != 'True':
        bad_response = True


# Print the flag if there are no bad responses
if not bad_response:
    print("5fa19b13a6314a3cc18bb49b213873df88f07bc6")
else:
    for line in return_data:
        print(line.strip())
