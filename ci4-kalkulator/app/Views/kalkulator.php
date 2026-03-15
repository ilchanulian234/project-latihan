<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kalkulator macOS</title>
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      body {
        font-family: -apple-system, BlinkMacSystemFont, 'SF Pro Display', 'Segoe UI', system-ui, sans-serif;
        background: linear-gradient(135deg, #1e1e1e 0%, #2d2d2d 100%);
        min-height: 100vh;
        padding: 40px 20px;
        color: #f5f5f7;
      }
      .calculator {
        max-width: 340px;
        margin: 0 auto;
        background: rgba(30, 30, 30, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 32px;
        padding: 28px;
        box-shadow: 
          0 32px 64px rgba(0,0,0,0.6),
          inset 0 1px 0 rgba(255,255,255,0.1);
      }
      .title {
        text-align: center;
        font-size: 24px;
        font-weight: 600;
        margin-bottom: 24px;
        opacity: 0.8;
      }
      .display {
        width: 100%;
        height: 100px;
        font-size: 52px;
        font-weight: 300;
        text-align: right;
        padding: 0 32px 16px 0;
        border: none;
        border-radius: 20px;
        background: rgba(18, 18, 18, 0.8);
        color: #f5f5f7;
        box-shadow: 
          inset 0 4px 12px rgba(0,0,0,0.6),
          0 2px 8px rgba(0,0,0,0.3);
        margin-bottom: 24px;
        pointer-events: none;
        letter-spacing: -1px;
      }
      .buttons {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-template-rows: repeat(5, 72px);
        gap: 16px;
      }
      button {
        border-radius: 28px;
        font-size: 34px;
        font-weight: 500;
        border: none;
        cursor: pointer;
        transition: all 0.2s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        position: relative;
        overflow: hidden;
      }
      button::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: left 0.5s;
      }
      button:hover::before {
        left: 100%;
      }
      button:active {
        transform: scale(0.95);
      }
      button.number {
        background: rgba(75, 75, 75, 0.8);
        color: #f5f5f7;
        box-shadow: 0 4px 16px rgba(0,0,0,0.4);
      }
      button.number:active {
        background: rgba(60, 60, 60, 1);
      }
      button.operator {
        background: rgba(255, 149, 0, 0.9);
        color: #fff;
        font-weight: 600;
        box-shadow: 0 6px 20px rgba(255, 149, 0, 0.4);
      }
      button.operator:active {
        background: rgba(255, 110, 0, 1);
      }
      button.function {
        background: rgba(120, 120, 130, 0.8);
        color: #f5f5f7;
        font-size: 30px;
      }
      button.function:active {
        background: rgba(100, 100, 110, 1);
      }
      button.equals {
        background: rgba(52, 199, 89, 1);
        color: #fff;
        font-weight: 700;
        font-size: 34px;
        box-shadow: 0 8px 24px rgba(52, 199, 89, 0.5);
      }
      button.equals:active {
        background: rgba(40, 167, 69, 1);
      }
      button.zero {
        grid-column: span 2;
      }
      .history-panel {
        background: rgba(30, 30, 30, 0.95);
        border-radius: 24px;
        padding: 24px;
        margin-top: 24px;
        max-height: 400px;
        overflow-y: auto;
      }
      .history-title {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 16px;
      }
      .history-item {
        padding: 12px;
        margin-bottom: 12px;
        background: rgba(255,255,255,0.05);
        border-radius: 16px;
        cursor: pointer;
        font-size: 16px;
        transition: all 0.2s;
        border: 1px solid rgba(255,255,255,0.1);
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
      }
      .history-item:hover {
        background: rgba(255,255,255,0.1);
        transform: translateY(-1px);
      }
      .clear-history {
        width: 100%;
        background: rgba(255, 59, 48, 0.9);
        color: white;
        height: 44px;
        font-size: 16px;
        font-weight: 600;
        border-radius: 16px;
        margin-top: 12px;
        cursor: pointer;
        transition: all 0.2s;
      }
      .clear-history:hover {
        background: rgba(255, 59, 48, 1);
      }
    </style>
  </head>
  <body>
    <div class="calculator">
      <div class="title">Kalkulator</div>
      <input type="text" class="display" id="display" value="0" />
      <div class="buttons">
        <button class="function" onclick="square()">x²</button>
        <button class="function" onclick="cube()">x³</button>
        <button class="function" onclick="clearDisplay()">AC</button>
        <button class="function" onclick="deleteLast()">DEL</button>
        
        <button class="number" onclick="appendValue('7')">7</button>
        <button class="number" onclick="appendValue('8')">8</button>
        <button class="number" onclick="appendValue('9')">9</button>
        <button class="operator" onclick="appendValue('÷')">÷</button>
        
        <button class="number" onclick="appendValue('4')">4</button>
        <button class="number" onclick="appendValue('5')">5</button>
        <button class="number" onclick="appendValue('6')">6</button>
        <button class="operator" onclick="appendValue('×')">×</button>
        
        <button class="number" onclick="appendValue('1')">1</button>
        <button class="number" onclick="appendValue('2')">2</button>
        <button class="number" onclick="appendValue('3')">3</button>
        <button class="operator" onclick="appendValue('-')">-</button>
        
        <button class="number zero" onclick="appendValue('0')">0</button>
        <button class="number" onclick="appendValue('.')">.</button>
        <button class="operator" onclick="appendValue('+')">+</button>
        <button class="equals" onclick="calculate()">=</button>
      </div>
      
      <div class="history-panel">
        <div class="history-title">Riwayat</div>
        <div id="historyList"></div>
        <button class="clear-history" onclick="clearHistory()">Hapus Riwayat</button>
      </div>
    </div>

    <script>
      const display = document.getElementById('display');
      let history = JSON.parse(localStorage.getItem('calcHistory')) || [];
      
      function appendValue(value) {
        if (display.value === '0' || display.value === 'Error') {
          display.value = value;
        } else {
          display.value += value;
        }
      }

      function clearDisplay() {
        display.value = '0';
      }

      function deleteLast() {
        display.value = display.value.slice(0, -1) || '0';
      }

      function calculate() {
        const input = display.value;
        try {
          const result = Function('return (' + input.replace(/×/g, '*').replace(/÷/g, '/') + ')')();
          const formattedResult = Number.isInteger(result) ? result : result.toFixed(8);
          display.value = formattedResult;
          // Save FULL expression: input = result
          history.unshift(input + ' = ' + formattedResult);
          if (history.length > 50) history = history.slice(0, 50);
          localStorage.setItem('calcHistory', JSON.stringify(history));
          updateHistory();
        } catch {
          display.value = 'Error';
        }
      }

      function square() {
        const val = parseFloat(display.value) || 0;
        display.value = val ** 2;
      }

      function cube() {
        const val = parseFloat(display.value) || 0;
        display.value = val ** 3;
      }

      function updateHistory() {
        const list = document.getElementById('historyList');
        list.innerHTML = history.slice(0, 10).map(item => 
          `<div class="history-item" onclick="display.value='${item.split('=')[1].trim()}'" title="${item}">${item}</div>`
        ).join('');
      }

      function clearHistory() {
        history = [];
        localStorage.removeItem('calcHistory');
        updateHistory();
      }

      document.addEventListener('keydown', e => {
        if (/[0-9.]/.test(e.key)) appendValue(e.key);
        else if (['+', '-', '*', '/', '×', '÷'].includes(e.key)) appendValue(e.key);
        else if (e.key === 'Enter') calculate();
        else if (e.key === 'Backspace') deleteLast();
        else if (e.key === 'Escape') clearDisplay();
      });

      updateHistory();
      display.focus();
    </script>
  </body>
</html>
