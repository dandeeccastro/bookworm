# Objetivo: converter linha do Dewey em 
# number, parent, category, 
if __name__ == "__main__":

    print("<?php\n\nuse Illuminate\Database\Seeder;\n\nclass DeweySeeder extends Seeder \n\n{\n\n\tpublic function run() \n\t{")

    dewey_file = open("DEWEY.txt")
    category_array = []

    for item in dewey_file:

        clean_item = item.rstrip()
        category = " ".join(clean_item.split()[1:])
        number = clean_item.split()[0]
        significant_digit = number[2]

        # Se estou caminhando por uma categoria, adiciono ela no array
        if(significant_digit != '0'):
            category_array.append({
                "category":category,
                "number":number,
                "parent":None,
                "significant_digit":significant_digit
                })

        # Quando chego no zero, significa que a categoria acabou, agora devo
        # lidar com o array montado
        else:

            # Um item na lista significa que ele não é uma folha 
            if len(category_array) == 1:

                # Itens na lista com - são raizes da árvore
                if '@@@@@' in category_array[0]["category"]:
                    category_array[0]["number"] = category_array[0]["number"][0]

                # Itens sem - são filhos das raízes
                else:
                    category_array[0]["number"] = category_array[0]["number"][1]
                    category_array[0]["parent"] = category_array[0]["number"][0]

            # Vários itens na lista são folhas do original
            else:
                for result in category_array:
                    result["parent"] = result["number"][:2]
                    result["number"] = result["significant_digit"]

            for line in category_array:
                print('\t\tDB::table("dewey")->insert(["number" => {0},"parent" => {1}, "category" => "{2}"]);'.format(line["number"], int(line["parent"]) if line["parent"] != None else "null",line["category"]))

            category_array.clear()

    print("\t}")
    print("}")
