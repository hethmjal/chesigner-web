graph = {
    "A": ["B", "C"],
    "B": ["D"],
    "C": ["E","F"],
    "D": [],
    "E": ["G"],
    "F": ["H","I"],
    "H": [],
    "I": [],
    "G": []
}

def depth(root):
  children = graph[root]

  if len(children) == 0:
    return 1

  return 1 + max( depth(child) for child in children )


print("the max depth is : ", depth("A"))

