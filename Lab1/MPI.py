from mpi4py import MPI

com = MPI.COMM_WORLD
rank = com.Get_rank()
total_processes = comm.Get_size()

if rank != 0:
    com.send("Greeting from: " + str(rank), dest = 0)
else:
    for pid in range(1, total_processes):
        print("Message: ", com.recv(source=pid))