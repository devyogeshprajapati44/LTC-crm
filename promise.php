<?php

?>


<script>
    var emp1 = new Promise((resolve, reject)=>{
    setTimeout(()=>{
      var dtls ={
        id : 1,
        name : "Ramesh Kumar",
        salary : 5000
      }
      console.log("first data has send");
      resolve(dtls)

    }, 1000*1)
  })

  let emp2 = new Promise((resolve, reject)=>{
    setTimeout(()=>{
      let dtls ={
        id : 2,
        name : "Suresh Kumar",
        salary : 7000
      }
      console.log("Second data has send");
      resolve(dtls)

    }, 1000*2)
  })

  let emp3 = new Promise((resolve, reject)=>{
    setTimeout(()=>{
      let dtls ={
        id : 3,
        name : "Yogesh Kumar",
        salary : 30000
      }
      console.log("Third data has send");
      resolve(dtls)

    }, 1000*2)
  })


  Promise.all([emp1, emp2, emp3]).then((x)=>{
    let total = 0;
     setTimeout(()=>{
      //console.log(x)

       x.forEach((a)=>{
        total += a.salary
        console.log(`Employ id = ${a.id}, Employ Name = ${a.name}, Employ Salary = ${a.salary},`)
       })
      console.log(`Total Amount on Salary : ${total}` )
     },1000)
     }).catch((y)=>{
    console.log(y)
  })

</script>