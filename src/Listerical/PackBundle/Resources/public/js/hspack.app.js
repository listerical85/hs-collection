var hsApp = angular.module('hsApp', ['autocomplete']);
hsApp.factory('CardRetriever',function($http, $q){
    var CardRetriever = new Object();
    CardRetriever.getcards = function(apikey, i) {
        var url = 'https://omgvamp-hearthstone-v1.p.mashape.com/cards/search/'+i+'?collectible=1';
        var carddata = $q.defer();
        $http.get(url,{headers:{'X-Mashape-Key':apikey}}).success(function(result){
            carddata.resolve(result);
        });
        return carddata.promise;
    };
    return CardRetriever;
});
hsApp.controller('HsCtrl', function($scope, CardRetriever){
    $scope.cards = [""];
    $scope.fullCard1 = null;
    $scope.fullCard2 = null;
    $scope.fullCard3 = null;
    $scope.fullCard4 = null;
    $scope.fullCard5 = null;
    $scope.card1Img = null;
    $scope.card2Img = null;
    $scope.card3Img = null;
    $scope.card4Img = null;
    $scope.card5Img = null;

    $scope.updateCards = function(typed) {
        $scope.newcards = CardRetriever.getcards($scope.mashape, typed);
        $scope.newcards.then(function(data){

            var cards = new Array();
            for ( card in data) {
                cards[cards.length] = data[card].name;
            }
            $scope.cards = cards;
        });
    },
    $scope.selectedCard1 = function(selection){
        card = CardRetriever.getcards($scope.mashape, selection);
        card.then(function(card){
            if(card[0]){
                $scope.fullCard1 = card[0];
                $scope.card1Img = card[0].img;
            }
        });
    },
    $scope.selectedCard2 = function(selection){
        card = CardRetriever.getcards$scope.mashape, (selection);
        card.then(function(card){
            if(card[0]) {
                $scope.fullCard2 = card[0];
                $scope.card2Img = card[0].img;
            }
        });

    },
    $scope.selectedCard3 = function(selection){
        card = CardRetriever.getcards($scope.mashape, selection);
        card.then(function(card){
            if(card[0]) {
                $scope.fullCard3 = card[0];
                $scope.card3Img = card[0].img;
            }

        });
    },
    $scope.selectedCard4 = function(selection){
        card = CardRetriever.getcards($scope.mashape, selection);
        card.then(function(card){
            if(card[0]) {
                $scope.fullCard4 = card[0];
                $scope.card4Img = card[0].img;
            }
        });

    },
    $scope.selectedCard5 = function(selection){
        card = CardRetriever.getcards($scope.mashape, selection);
        card.then(function(card){
            if(card[0]) {
                $scope.fullCard5 = card[0];
                $scope.card5Img = card[0].img;
            }
        });

    }
});


