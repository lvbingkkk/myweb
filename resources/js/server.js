const https = require('https')
https.get('https://www.baidu.com',(res) => {
    let str = ''
    res.on('data',(chunk )=>{
        str += chunk
    })
    res.on('end',()=>{
        console.log(str)
    })
})
