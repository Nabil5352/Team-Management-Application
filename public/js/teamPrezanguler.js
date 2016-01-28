function sendMessageController($scope, $http){

  // $scope.recipients = [
  //   { id:1, fullname:"first"},
  //   { id:2, fullname:"second"}
  // ];

  $scope.items = [];

  $http.get('memberforinbox').success(function(recipients){
    $scope.recipients = recipients;
  });

  $scope.unread = function(){
    var count = 0;

    angular.forEach($scope.recipients, function(recipient){
      count += recipient.unread? 1 : 0;
    });

    return count;
  }

  $scope.sendMessage = function(recipient, subject, message, sender_id, time){
    $scope.items.push(
      {
      name:recipient.fullname,
      subject:subject,
      message:message,
      sender:sender_id,
      time:time
      }
    );
  };

  $scope.saveMessage = function(recipient, subject, message){
    $scope.items.push(
      {
      name:recipient.fullname,
      subject:subject,
      message:message
      }
    );
  }

}
<input type="hidden" name="someData" value="{{data}}" /> {{data}}
<input type="hidden" name="someData" ng-model="data" /> {{data}}