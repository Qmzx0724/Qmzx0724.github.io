export default{
   data(){
        return {
             webSocket:null
         }
   },
   created(){
        //页面刚进入时开启长连接
         this.initWebSocket();
   },
   destroyed(){
        //页面销毁时关闭长连接
        this.webSocketClose();
   },
   methods: {
       initWebSocket(){            //初始化websocket
            const url='ws://121.40.165.18:8800';
            this.webSocket=new WebSocket(url);
            this.webSocket.onopen=this.socketOpen;
            this.webSocket.onerror=this.socketError;
            this.webSocket.onmessage=this.socketMessage;
            this.webSocket.onclose=this.webSocketClose;
       },
       socketOpen(){
              console.log('socket open');
       },
       socketError(e){
             console.log('socket error');
      },
       socketMessage(e){
            /* const redata = JSON.parse(e.data);*/
           //获取数据并且处理数据的地方
           console.log(e);
      },
        websocketsend(agentData){//数据发送
            this.websock.send(agentData);
      },
       webSocketClose(e){
            console.log("connection closed");
       }
     }
   
   }