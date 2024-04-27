void main() {
  // 1. Variabel list di dalam sebuah map
  Map<String, List<int>> mapWithList = {
    'list': [1, 2, 4, 5, 6, 7],
  };

  // Tampilkan hasilnya
  print('1. Variabel list di dalam sebuah map:');
  mapWithList.forEach((key, value) {
    print('$key: $value');
  });

  // 2. Variabel list yang berisikan map
  List<Map<String, int>> listOfMap = [
    {'a': 1, 'b': 2, 'c': 4},
    {'d': 5, 'e': 6,},
  ];

  // Tampilkan hasilnya
  print('\n2. Variabel list yang berisikan map:');
  for (var map in listOfMap) {
    map.forEach((key, value) {
      print('$key: $value');
    });
    print('---');
  }
}
