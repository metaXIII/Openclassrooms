import { useContext, useEffect, useState } from 'react'
import { ThemeContext } from '../context'

export function useFetch(url) {
  const [data, setData] = useState({})
  const [isLoading, setIsLoading] = useState(true)
  const [error, setError] = useState(false)

  useEffect(() => {
    if (!url) return

    async function fetchData() {
      const response = await fetch(url)
      const data = await response.json()
      setData(data)
      setIsLoading(false)
    }

    setIsLoading(true)
    fetchData().catch(() => setError(true))
  }, [url])

  return { isLoading, data, error }
}

export function useTheme() {
  const { theme, toggleTheme } = useContext(ThemeContext)
  return { theme, toggleTheme }
}
