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
visited = []


def dfs(visited, graph, root, depth=0):
    global maxdepth
    maxdepth = max(depth,maxdepth)
    if root not in visited:
        visited.append(root)
        print(root)
        for child in graph[root]:
            dfs(visited, graph, child, depth+1)


maxdepth = 0
dfs(visited, graph, "A")
print("max depth", maxdepth)


def bfs(graph, root):
    maxdepth = 0
    visited = []
    queue = []
    visited.append(root)
    queue.append((root,1))
    while queue:
        x,depth = queue.pop(0)
        maxdepth = max(maxdepth,depth)
        print(x)
        for child in graph[x]:
            if child not in visited:
                visited.append(child)
                queue.append((child,depth+1))
    return maxdepth

print("max depth", bfs(graph, "A"))