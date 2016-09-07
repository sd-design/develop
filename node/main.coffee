paper = Snap 800, 500

style =
  fill: '#030303'
  stroke: '#444'
  stokeWidth: 3

circle = paper
  .circle 200, 200, 60
  .attr style

rect = paper
  .rect 300, 100, 100, 100
  .attr style

group = paper.g circle, rect
group.drag (dx) -> @transform "r#{dx},200,200"
