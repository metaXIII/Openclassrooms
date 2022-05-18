import { formatJobList, formatQueryParams } from './index'

describe('the function FormatJobList', () => {
  it('should add comma to item', () => {
    const result = 'item2,'
    expect(formatJobList('item2', 3, 1)).toEqual(result)
  })

  it("should not addd comma for last item", () => {
    const result = "item3"
    expect(formatJobList("item3", 3,2))
  })
})

describe('The formatQueryParams function', () => {
  it('should use the right format for param', () => {
    const expectedState = 'a1=answer1'
    expect(formatQueryParams({ 1: 'answer1' })).toEqual(expectedState)
  })


  it('should concatenate params with an &', () => {
    const expectedState = 'a1=answer1&a2=answer2'
    expect(formatQueryParams({ 1: 'answer1', 2: 'answer2' })).toEqual(
      expectedState
    )
  })
})
