from controllers.GlobalController import GlobalController

gc = GlobalController("db.txt")
gc.connect()

while True:
	s = input()
	if s == "q":
		break
	ans = gc.execute(s)

	print("\n")
	for i in ans:
		print(i)
	print("\n")