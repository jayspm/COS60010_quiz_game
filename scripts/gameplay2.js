const numbers = [
    {
      answerNum: "a1",
      questionNum: "e1",
      color: "#ff0000"
    },
    {
      answerNum: "a2",
      questionNum: "e2",
      color: "#fd5c63"
    },
    {
      answerNum: "a3",
      questionNum: "e3",
      color: "#333333"
    },
    {
      answerNum: "a4",
      questionNum: "e4",
      color: "#a4c639"
    },
    {
      answerNum: "a5",
      questionNum: "e5",
      color: "#000000"
    }
  ];
  let correct = 0;
  let wrong = 0;
  let total = 0;
  const totalDraggableItems = 5;
  const totalMatchingPairs = 5; // Should be <= totalDraggableItems
  
  const scoreSection = document.querySelector(".score");
  const correctSpan = scoreSection.querySelector(".correct");
  const wrongSpan = scoreSection.querySelector(".wrong");
  const totalSpan = scoreSection.querySelector(".total");
  const playAgainBtn = scoreSection.querySelector("#play-again-btn");
  
  const draggableItems = document.querySelector(".draggable-items");
  const matchingPairs = document.querySelector(".matching-pairs");
  let draggableElements;
  let droppableElements;
  
  initiateGame();
  
  function initiateGame() {
    const randomDraggableNumbers = generateRandomItemsArray(totalDraggableItems, numbers);
    const randomDroppableNumbers = totalMatchingPairs<totalDraggableItems ? generateRandomItemsArray(totalMatchingPairs, randomDraggableNumbers) : randomDraggableNumbers;
    const alphabeticallySortedRandomDroppableNumbers = [...randomDroppableNumbers].sort((a,b) => a.questionNum.toLowerCase().localeCompare(b.questionNum.toLowerCase()));
    
    // Create "draggable-items" and append to DOM
    for(let i=0; i<randomDraggableNumbers.length; i++) {
      draggableItems.insertAdjacentHTML("beforeend", `
        <div class="${randomDraggableNumbers[i].answerNum} draggable" draggable="true" style="color: ${randomDraggableNumbers[i].color};" id="${randomDraggableNumbers[i].answerNum}">${randomDraggableNumbers[i].answerNum}</div>
      `);
    }
    // <div class="fab fa-${randomDraggableNumbers[i].answerNum} draggable" draggable="true" style="color: ${randomDraggableNumbers[i].color};" id="${randomDraggableNumbers[i].answerNum}">${randomDraggableNumbers[i].answerNum}</div>

    // Create "matching-pairs" and append to DOM
    for(let i=0; i<alphabeticallySortedRandomDroppableNumbers.length; i++) {
      matchingPairs.insertAdjacentHTML("beforeend", `
        <div class="matching-pair">
          <span class="label">${alphabeticallySortedRandomDroppableNumbers[i].questionNum}</span>
          <span class="droppable" data-number="${alphabeticallySortedRandomDroppableNumbers[i].answerNum}"></span>
        </div>
      `);
    }
    
    draggableElements = document.querySelectorAll(".draggable");
    droppableElements = document.querySelectorAll(".droppable");
    
    draggableElements.forEach(elem => {
      elem.addEventListener("dragstart", dragStart);
      // elem.addEventListener("drag", drag);
      // elem.addEventListener("dragend", dragEnd);
    });
    
    droppableElements.forEach(elem => {
      elem.addEventListener("dragenter", dragEnter);
      elem.addEventListener("dragover", dragOver);
      elem.addEventListener("dragleave", dragLeave);
      elem.addEventListener("drop", drop);
    });
  }
  
  // Drag and Drop Functions
  
  //Events fired on the drag target
  
  function dragStart(event) {
    event.dataTransfer.setData("text", event.target.id); // or "text/plain"
  }
  
  //Events fired on the drop target
  
  function dragEnter(event) {
    if(event.target.classList && event.target.classList.contains("droppable") && !event.target.classList.contains("dropped")) {
      event.target.classList.add("droppable-hover");
    }
  }
  
  function dragOver(event) {
    if(event.target.classList && event.target.classList.contains("droppable") && !event.target.classList.contains("dropped")) {
      event.preventDefault();
    }
  }
  
  function dragLeave(event) {
    if(event.target.classList && event.target.classList.contains("droppable") && !event.target.classList.contains("dropped")) {
      event.target.classList.remove("droppable-hover");
    }
  }
  
  function drop(event) {
    event.preventDefault();
    event.target.classList.remove("droppable-hover");
    const draggableElementNumber = event.dataTransfer.getData("text");
    const droppableElementNumber = event.target.getAttribute("data-number");
    const isCorrectMatching = draggableElementNumber===droppableElementNumber;
    const isWrongMatching = draggableElementNumber!==droppableElementNumber;
    total++;
    if(isCorrectMatching) {
      const draggableElement = document.getElementById(draggableElementNumber);
      event.target.classList.add("dropped");
      draggableElement.classList.add("dragged");
      draggableElement.setAttribute("draggable", "false");
      event.target.innerHTML = `<div class="${randomDraggableNumbers[i].answerNum} draggable" draggable="true" style="color: ${randomDraggableNumbers[i].color};" id="${randomDraggableNumbers[i].answerNum}">${randomDraggableNumbers[i].answerNum}</div>`;
      correct++;  
    }
    if(isWrongMatching) {
        const draggableElement = document.getElementById(draggableElementNumber);
        event.target.classList.add("dropped");
        draggableElement.classList.add("dragged");
        draggableElement.setAttribute("draggable", "false");
        event.target.innerHTML = `<div class="${randomDraggableNumbers[i].answerNum} draggable" draggable="true" style="color: ${randomDraggableNumbers[i].color};" id="${randomDraggableNumbers[i].answerNum}">${randomDraggableNumbers[i].answerNum}</div>`;
        wrong++;  
      }
    scoreSection.style.opacity = 0;
    setTimeout(() => {
      correctSpan.textContent = correct;
      wrongSpan.textContent = wrong;
      totalSpan.textContent = total;
      scoreSection.style.opacity = 1;
    }, 200);
    if(correct===Math.min(totalMatchingPairs, totalDraggableItems)) { // Game Over!!
      playAgainBtn.style.display = "block";
      setTimeout(() => {
        playAgainBtn.classList.add("play-again-btn-entrance");
      }, 200);
    }
    total++;
  }
  
  // Other Event Listeners
  playAgainBtn.addEventListener("click", playAgainBtnClick);
  function playAgainBtnClick() {
    playAgainBtn.classList.remove("play-again-btn-entrance");
    correct = 0;
    wrong = 0;
    total = 0;
    draggableItems.style.opacity = 0;
    matchingPairs.style.opacity = 0;
    setTimeout(() => {
      scoreSection.style.opacity = 0;
    }, 100);
    setTimeout(() => {
      playAgainBtn.style.display = "none";
      while (draggableItems.firstChild) draggableItems.removeChild(draggableItems.firstChild);
      while (matchingPairs.firstChild) matchingPairs.removeChild(matchingPairs.firstChild);
      initiateGame();
      correctSpan.textContent = correct;
      wrongSpan.textContent = wrong;
      totalSpan.textContent = total;
      draggableItems.style.opacity = 1;
      matchingPairs.style.opacity = 1;
      scoreSection.style.opacity = 1;
    }, 500);
  }
  
  // Auxiliary functions
  function generateRandomItemsArray(n, originalArray) {
    let res = [];
    let clonedArray = [...originalArray];
    if(n>clonedArray.length) n=clonedArray.length;
    for(let i=1; i<=n; i++) {
      const randomIndex = Math.floor(Math.random()*clonedArray.length);
      res.push(clonedArray[randomIndex]);
      clonedArray.splice(randomIndex, 1);
    }
    return res;
  }