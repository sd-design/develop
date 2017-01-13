app.controller('MainController', ['$scope', function($scope) { 
  $scope.title = 'Пример приложения на Angular 1.5'; 
  $scope.promo = 'Самы пополярные книги месяца.';
  $scope.products = [ 
     { 
    name: 'The Book of Trees', 
    price: 19, 
    pubdate: new Date('2014', '03', '08'), 
    cover: 'https://cv1.litres.ru/static/bookimages/11/39/88/11398814.bin.dir/11398814.cover.jpg',
    likes: 0,
    dislikes: 0
  },
  { 
    name: 'The Book of Trees', 
    price: 19, 
    pubdate: new Date('2014', '03', '08'), 
    cover: 'https://cv1.litres.ru/static/bookimages/11/39/88/11398814.bin.dir/11398814.cover.jpg',
    likes: 0,
    dislikes: 0 
  }, 
  { 
    name: 'Program or be Programmed', 
    price: 8, 
    pubdate: new Date('2013', '08', '01'), 
    cover: 'https://cv7.litres.ru/static/bookimages/19/91/97/19919776.bin.dir/19919776.cover_415.jpg',
    likes: 0,
    dislikes: 0 
  }, 
  { 
    name: 'Program or be Programmed', 
    price: 8, 
    pubdate: new Date('2013', '08', '01'), 
    cover: 'https://cv7.litres.ru/static/bookimages/19/91/97/19919776.bin.dir/19919776.cover_415.jpg',
    likes: 0,
    dislikes: 0
  } 
];
 $scope.plusOne = function(index) { 
 $scope.products[index].likes += 1; 

};
 $scope.minusOne = function(index) { 
 $scope.products[index].dislikes += 1; 
};
}]);