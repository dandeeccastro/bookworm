if __name__ == "__main__":
    dewey_file = open("DEWEY.txt")
    number = None
    parent = None
    for item in dewey_file:
        number = item.rstrip().split()[0]
        if "." in number :
            continue
        for i in range(2,-1, -1):
            # print(i)
            if number[i] is not '0':
                temp = number
                parent = temp[:i]
                number = int(temp[i])
        if number is None:
            number = 0
            parent = None
        print(parent,number)
        category = " ".join(item.rstrip().split()[1:])
        # print(number, parent, category)