function getColor(){
  let res1=parseInt(Math.random()*255)
  let res2=parseInt(Math.random()*255)
  let res3=parseInt(Math.random()*255)
  let res4=Math.random()
  let str=`rgba(${res1},${res2},${res3},${res4})`
  return str
}

function drag(node){
  node.onmousedown=function(ev){
    let e = ev || window.event
    let x = e.clientX - this.offsetLeft
    let y = e.clientY - this.offsetTop
    let _this=this
    console.log(_this.style.width)
    document.onmouseover=function(ev){
      let e = ev || window.event
      let l = e.clientX-x
      let t = e.clientY-y
      let win_width=document.documentElement.clientWidth || document.body.clientWidth
      let win_height= document.documentElement.clientHeight ||document.body.clientHeight
      if(l<0){l=0}
      if(t<0){t=0}
      if(l>win_width-_this.offsetWidth){l=win_width-_this.offsetWidth}
      if(t>win_height-_this.offsetHeight){t=win_height-_this.offsetHeight}
      _this.style.left=l+'px'
      _this.style.top=t+'px'
    }
  }
  document.onmouseup=function(){
    this.onmouseover=null
  }
}

function getTitle(tableId){
  return new Promise((resolve,reject)=>{
    $.ajax({
      type:'get',
      url:'./getTitle.php',
      data:{
        tableid:tableId
      },
      success:function(datas){
        
        if(parseInt(datas)==0){
          reject('获取失败')
        }else{
          
          datas=JSON.parse(datas)
          for(let i=0; i<datas.length;i++){
            $(`<li class="shadow"  index=${i+1}><a id="${i+1}" href="./show.html">${datas[i]}</a></li>`)
            .css({
              backgroundColor:getColor()
            })
            .appendTo($('#content'))
          }
          resolve('获取成功')
        }
        
      },
      error:function(err){
        reject('ajax请求失败'+err)
      }
    })
  })
}



