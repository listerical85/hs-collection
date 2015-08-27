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
    CardRetriever.getcard = function(apikey, i) {
        var url = 'https://omgvamp-hearthstone-v1.p.mashape.com/cards/'+i+'?collectible=1';
        var carddata = $q.defer();
        $http.get(url,{headers:{'X-Mashape-Key':apikey}}).success(function(result){
            carddata.resolve(result);
        });
        return carddata.promise;
    };
    return CardRetriever;
});
hsApp.controller('HsCtrl', function($scope, $http, CardRetriever){
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

    $scope.submitForm = function() {
        if ($scope.packform.$valid) {
            $http({
                method: 'POST',
                url: Routing.generate('save_pack'),
                data: $('[name=packform]').serialize(),  // pass in data as strings
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}  // set the headers so angular passing info as form data (not request payload)
            }).success(function (data) {
                    if (!data.success) {
                       alert('Je pack is niet opgeslagen!');
                    } else {
                        // if successful, bind success message to message
                        document.location.href = data.url;
                    }
                });
            return true;
        } else {
            alert('Het pakje is niet volledig ingevuld.');
        }
    };
    $scope.reset = function() {
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
    },
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
        card = CardRetriever.getcard($scope.mashape, selection);
        card.then(function(card){
            if(card[0]){
                $scope.fullCard1 = card[0];
                $scope.cardid1 = card[0].cardId;
                $scope.card1Img = card[0].img;
            }
        });
    },
    $scope.selectedCard2 = function(selection){
        card = CardRetriever.getcard($scope.mashape, selection);
        card.then(function(card){
            if(card[0]) {
                $scope.fullCard2 = card[0];
                $scope.cardid2 = card[0].cardId;
                $scope.card2Img = card[0].img;
            }
        });

    },
    $scope.selectedCard3 = function(selection){
        card = CardRetriever.getcard($scope.mashape, selection);
        card.then(function(card){
            if(card[0]) {
                $scope.fullCard3 = card[0];
                $scope.cardid3 = card[0].cardId;
                $scope.card3Img = card[0].img;
            }

        });
    },
    $scope.selectedCard4 = function(selection){
        card = CardRetriever.getcard($scope.mashape, selection);
        card.then(function(card){
            if(card[0]) {
                $scope.fullCard4 = card[0];
                $scope.cardid4 = card[0].cardId;
                $scope.card4Img = card[0].img;
            }
        });

    },
    $scope.selectedCard5 = function(selection){
        card = CardRetriever.getcard($scope.mashape, selection);
        card.then(function(card){
            if(card[0]) {
                $scope.fullCard5 = card[0];
                $scope.cardid5 = card[0].cardId;
                $scope.card5Img = card[0].img;
            }
        });

    };
    $scope.$watch('goldenc1',function(){
        if($scope.fullCard1 && $scope.goldenc1) {
            $scope.card1Img = $scope.fullCard1.imgGold;
        } else if ($scope.fullCard1 && !$scope.goldenc1) {
            $scope.card1Img = $scope.fullCard1.img;
        }
    });
    $scope.$watch('goldenc2',function(){
        if($scope.fullCard2 && $scope.goldenc2) {
            $scope.card2Img = $scope.fullCard2.imgGold;
        } else if ($scope.fullCard2 && !$scope.goldenc2) {
            $scope.card2Img = $scope.fullCard2.img;
        }
    });
    $scope.$watch('goldenc3',function(){
        if($scope.fullCard3 && $scope.goldenc3) {
            $scope.card3Img = $scope.fullCard3.imgGold;
        } else if ($scope.fullCard3 && !$scope.goldenc3) {
            $scope.card3Img = $scope.fullCard3.img;
        }
    });
    $scope.$watch('goldenc4',function(){
        if($scope.fullCard4 && $scope.goldenc4) {
            $scope.card4Img = $scope.fullCard4.imgGold;
        } else if ($scope.fullCard4 && !$scope.goldenc4) {
            $scope.card4Img = $scope.fullCard4.img;
        }
    });
    $scope.$watch('goldenc5',function(){
        if($scope.fullCard5 && $scope.goldenc5) {
            $scope.car51Img = $scope.fullCard5.imgGold;
        } else if ($scope.fullCard5 && !$scope.goldenc5) {
            $scope.card5Img = $scope.fullCard5.img;
        }
    });
});


