from mpi4py import MPI
com = MPI.COMM_WORLD
rank = com.Get_rank()
total_processes = com.Get_size()

if rank == 1:
    com.send(2/2, dest = 0)
    
elif rank == 2:
    com.send(4 + 5, dest = 0)
    
elif rank == 3:
    com.send(2 * (6 + 6 + 4 + 4), dest = 0)
    
else:
    from_1 = int(com.recv(source = 1))
    print("(2/2) = ", from_1)

    from_2 = int(com.recv(source=2))
    print("(4+5) = ", from_2)

    from_3 = int(com.recv(source = 3))
    print("(2 * (6 + 6 + 4 + 4)) = ", from_3)

    area = from_1 * (from_2 + from_3)
    print("Area under the curve is", area)