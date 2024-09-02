//request de módulos e importanciones
const express = require("express"); //Se utiliza para crear la "aplicación web" en este caso el backend
const app = express();
const {exec} = require("child_process"); //Se encarga de ejecutar los archvios batch o bash
const cors =require("cors")//Se encarga de conectar frontend con el backend
const fs = require("fs"); //Se usa para leer archivos del lado del backend
const multer = require("multer"); //Se usa para la subida de archivos
const bodyParser = require("body-parser");
const webrtc=require("wrtc");
const server = require("http").createServer(app)

//Configuración de módulos
app.use(express.static("client"));
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({extended:true}));

const storage=multer.diskStorage({
    destination:function(req,file,cb){
        cb(null,"./client/src/assets/files");
    },
    filename: function(req,file,cb){
        cb(null,"auxiliar1.c");
    }
})
const upload= multer({storage:storage});

app.use(cors());//Cors Se encarga de conectar este backend corriendo en el puerto 8080 con el frontend

let senderStream;
let openStream=false;
//requests

app.get("/CodeBase",(req,res)=>{ //Recupera el código base para empezar a programar
    fs.readFile("client/src/assets/files/basic.c","utf-8",(err,data)=>{
        if(err){
            console.error(err);
            res.status(500).send("no se pudo leer el archivo");
        }else{
            res.send(data);
        }
    });
});

app.post("/subir",upload.single("cargar"),(req,res)=>{ //Permite subir un archivo y cambiar el código
    if(req.file){
        fs.readFile("client/src/assets/files/auxiliar1.c","utf-8",(err,data)=>{
            if(err){
                console.error(err);
            }else{
                res.send(data);
            }
        })
    } else{
        res.status(400).json({error:"no se subió ningún archivo"});
    }
})

app.get("/subir/actualizar",(req,res)=>{
    fs.readFile("client/src/assets/files/auxiliar1.c","utf-8",(err,data)=>{
        if(err){
            console.error(err);
            res.status(500).send("no se pudo leer el archivo");
            return;
        }else{
            res.send(data);
        }
    })

})

app.post("/consumer", async ({ body }, res) => {
    const peer = new webrtc.RTCPeerConnection({
        iceServers: [
            {
                urls: "stun:stun.stunprotocol.org"
            }
        ]
    });
    const desc = new webrtc.RTCSessionDescription(body.sdp);
    await peer.setRemoteDescription(desc);
    if(openStream){
    senderStream.getTracks().forEach(track => peer.addTrack(track, senderStream));
    
    const answer = await peer.createAnswer();
    await peer.setLocalDescription(answer);
    const payload = {
        sdp: peer.localDescription
    }

    res.json(payload);
    } else{
        res.status(500).send("No hay cámara de servidor conectado");
        console.log("no hay cámara conectada");
    }
});

app.post('/broadcast', async ({ body }, res) => {
    const peer = new webrtc.RTCPeerConnection({
        iceServers: [
            {
                urls: "stun:stun.stunprotocol.org"
            }
        ]
    });
    peer.ontrack = (e) => handleTrackEvent(e, peer);
    const desc = new webrtc.RTCSessionDescription(body.sdp);
    await peer.setRemoteDescription(desc);
    const answer = await peer.createAnswer();
    await peer.setLocalDescription(answer);
    const payload = {
        sdp: peer.localDescription
    }

    res.json(payload);
});

function handleTrackEvent(e, peer) {
    senderStream = e.streams[0];
    openStream=true;
    console.log("Hay una cámara conectada");
    
};

exec("bash ./client/src/scripts/Build2.sh",(error, stdout,stderr)=>{
    if(error){
        console.error(error.message);
        return;
    }
    if(stdout){
        console.log(stdout);
        return;
    }
    if(stderr){
        console.error(stderr);
        return;
        
    }
});

server.listen(8080,"0.0.0.0",()=>{
    console.log("El servidor está levantado en el puerto 8080");
    
})