


const axios = require('axios')
axios.get('https://www.baidu.com')
    .then(result=>{
    console.log(result.data)
})
    .catch((err)=>{

    })

