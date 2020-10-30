#Trapezoidal formula h/2((y0 + yn) + 2(y1+y2 ... yn-1))

def trapezoid(n):
    area = 2/2 * ((4 + n) + 2 * (6 + 6 + 4 + 4))
    return area

print("Area under the curve is", trapezoid(5))