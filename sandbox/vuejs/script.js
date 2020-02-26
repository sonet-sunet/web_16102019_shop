let app = new Vue({
    el: '.app',
    data:{
        message: 'Hello, world',
        name: 'Nordic IT School'
    }
});

let counter = new Vue({
    el: '.counter',
    idInterval: null,
    data:{
        seconds: 10,
        countClicks: 0,
        result: '',
        countToWin: 10,
        gameIsStart: false   
    },
    methods:{
        startGame(){
            this.gameIsStart = true;
            this.idInterval = setInterval(()=>{
                this.seconds--;
                if( this.seconds == 0 ){
                    this.finishGame();
                } 
            }, 1000);    
        },
        addCount(){
            this.countClicks++;
            if( this.countClicks == 10 ){
                this.finishGame();
            }
        },
        finishGame(){
            clearInterval(this.idInterval);
            console.log(this.countClicks, this.countToWin);
            if( this.countClicks == this.countToWin && this.countClicks > 0 ){
                this.result = 'Вы выиграли';
            }else{
                this.result = 'Вы проиграли';
            }

        }
    }
});